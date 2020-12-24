<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

class Finder extends Fuel\Core\Finder
{
    protected static $_suffixed_directories = array('config' => 'config', 'views' => 'view', 'lang' => 'lang');

    public static function instance()
    {
        $paths = \Config::get('novius-os.finder_paths');
        if (!static::$instance) {
            static::$instance = static::forge($paths);
        }

        return static::$instance;
    }

    public function add_path($paths, $pos = null)
    {
        if ($pos !== null && $pos !== -1) {
            $pos++;
        }

        return parent::add_path($paths, $pos);
    }

    /**
     * Locates a given file in the search paths.
     *
     * @param   string  $dir       Directory to look in
     * @param   string  $file      File to find
     * @param   string  $ext       File extension
     * @param   bool    $multiple  Whether to find multiple files
     * @param   bool    $cache     Whether to cache this path or not
     * @return  mixed  Path, or paths, or false
     */
    public function locate($dir, $file, $ext = '.php', $multiple = false, $cache = true)
    {
        $found = $multiple ? array() : false;

        // absolute path requested?
        if ($file[0] === '/' or (isset($file[1]) and $file[1] === ':')) {
            if (!is_file($file)) {
                // at this point, found would be either empty array or false
                return $found;
            }

            return $multiple ? array($file) : $file;
        }


        // Novius OS : force load module if not already load
        $context = false;
        if ($dir === 'config') {
            $dbt = debug_backtrace(defined('DEBUG_BACKTRACE_IGNORE_ARGS') ? DEBUG_BACKTRACE_IGNORE_ARGS : false);
            foreach ($dbt as $context) {
                if (!empty($context['class']) && $context['class'] == 'Fuel\Core\Config' && !empty($context['function'])) {
                    if (in_array($context['function'], array('load', 'save'))) {
                        $context = 'config.'.$context['function'];
                    }
                    break;
                }
            }
        }

        $cache_id = $multiple ? 'M.' : 'S.';
        $paths = array();

        // If a filename contains a :: then it is trying to be found in a namespace.
        // This is sometimes used to load a view from a non-loaded module.
        if ($pos = strripos($file, '::')) {
            // Novius OS : force load module if not already load
            $is_extend_allowed = substr($file, 0, 1) !== '!';
            if (!$is_extend_allowed) {
                $file = substr($file, 1);
                $pos--;
            }
            $dir_app = substr($file, 0, $pos);
            Module::load(strtolower($dir_app));

            if ($dir === 'views' && $dir_app !== 'local') {
                // Novius OS : load view in local if exist
                $local_file = substr($file, $pos + 2);

                $dependencies = \Nos\Config_Data::get('app_dependencies', array());
                $extend_dirs = array('local');
                if (!empty($dependencies[$dir_app])) {
                    foreach ($dependencies[$dir_app] as $application => $dependency) {
                        $extend_dirs[] = $application;
                    }
                }
                foreach ($extend_dirs as $extend_dir) {
                    $found = \Finder::search(
                        'views',
                        $dir_app === 'nos' ?
                        $extend_dir.'::novius-os'.DS.$local_file :
                        $extend_dir.'::apps'.DS.$dir_app.DS.$local_file,
                        $ext,
                        $multiple,
                        $cache
                    );
                    if ($found !== false) {
                        return $found;
                    }
                }

            } else if ($is_extend_allowed && ($dir === 'config' || ($dir === 'lang' && $dir_app !== 'local'))) {
                $paths_add = static::pathsExtended($dir, $dir_app, substr($file, $pos + 2));
            }

            // get the namespace path
            if ($path = \Autoloader::namespace_path('\\'.ucfirst(substr($file, 0, $pos)))) {
                $cache_id .= substr($file, 0, $pos);

                // and strip the classes directory as we need the module root
                $paths = array(substr($path, 0, -8));

                // strip the namespace from the filename
                $file = substr($file, $pos + 2);
            }
        } else {
            $paths = $this->paths;

            // get extra information of the active request
            if (class_exists('Request', false) and ($request = \Request::active())) {
                $request->module and $cache_id .= $request->module;
                if ($request->module !== 'nos') {
                    $paths = array_merge($request->get_paths(), $paths);
                }
            }
        }

        // Merge in the flash paths then reset the flash paths
        $paths = array_merge($this->flash_paths, $paths);
        // Novius OS : load config in local if exist
        if (!empty($paths_add)) {
            $paths = array_merge($paths_add, $paths);
        }
        $this->clear_flash();

        $file_original = $file;
        $file = $this->prep_path($dir).$file.$ext;
        $cache_id .= $file;

        if ($cache and $cached_path = $this->from_cache($cache_id)) {
            return $cached_path;
        }

        list($section) = explode(DS, $dir);
        $directory = $dir;
        foreach ($paths as $dir) {
            // Novius OS : load config in local if exist
            if (!empty($paths_add) && in_array($dir, $paths_add)) {
                $file_path = $dir.$file_original.$ext;
            } else {
                $file_path = $dir.$file;
            }

            // Novius OS : somme file can have a sub-suffixe
            if (!empty(static::$_suffixed_directories[$section])) {
                if (!empty($paths_add) && in_array($dir, $paths_add)) {
                    $file_path_alt = $dir.$file_original.'.'.static::$_suffixed_directories[$section].$ext;
                } else {
                    $file_path_alt = $dir.$this->prep_path($directory).$file_original.'.'.static::$_suffixed_directories[$section].$ext;
                }

                if (is_file($file_path_alt)) {
                    if (!$multiple) {
                        $found = $file_path_alt;
                        break;
                    }

                    $found[] = $file_path_alt;
                }
            }
            if (is_file($file_path)) {
                if (!$multiple) {
                    $found = $file_path;
                    break;
                }

                $found[] = $file_path;
            }
        }

        if (!empty($found) and $cache) {
            $this->add_to_cache($cache_id, $found);
            $this->cache_valid = false;
        }

        // Novius OS : If a config has to be written it HAS to be within the APPPATH
        if (empty($found) && $context == 'config.save') {
            return Module::exists(!$pos ? 'local' : $dir_app).$this->prep_path($directory).$file_original.'.config'.$ext;
        }

        return $found;
    }

    protected static function pathsExtended($dir, $app_extended, $file)
    {
        $paths_add = array(APPPATH.$dir.DS.($app_extended === 'nos' ? 'novius-os'.DS : 'apps'.DS.$app_extended.DS));

        $dependencies = \Nos\Config_Data::get('app_dependencies', array());

        if (!empty($dependencies[$app_extended])) {
            $metadata = \Nos\Config_Data::load('app_installed', false);
            foreach ($dependencies[$app_extended] as $application => $dependency) {
                if ($dir === 'config') {
                    $extends = $metadata[$application]['extends'];
                    if (!is_array($extends) ||
                        (isset($extends['application']) && \Arr::get($extends, 'extend_configuration', true))) {
                        $extend_config = \Config::load($application.'::'.$file, true);
                        if (!empty($extend_config)) {
                            $paths_add[] = \Nos\Application::get_application_path($application).DS.$dir.DS;

                            \Log::deprecated(
                                'The config file "'.$app_extended.'::'.$file.'" is extended by application '.
                                '"'.$application.'" without using a subdirectory "'.($app_extended === 'nos' ? 'novius-os/' : 'apps/'.$app_extended.'/').'", this '.
                                'mechanism is deprecated.',
                                'Dubrovka'
                            );
                            continue;
                        }
                    }
                }

                $paths_add[] = \Nos\Application::get_application_path($application).DS.$dir.DS.
                    ($app_extended === 'nos' ? 'novius-os'.DS : 'apps'.DS.$app_extended.DS);
            }
        }

        return $paths_add;
    }
}
