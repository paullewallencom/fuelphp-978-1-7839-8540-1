<?php
namespace Fuel\Tasks;

class Movescaffoldtomodule
{
    /**
    * Specify files that have to move from the main
    * application to the module. For each item, the type key
    * indicate the type of file we are dealing with (controller,
    * model, views [directory]), and the path key the relative
    * path of the file to the application and the module.
    */
    static $files_to_move = array(
        array(
            'type' => 'controller',
            'path' =>
            'classes/controller/admin/(:scaffold).php',
        ),
        array(
            'type' => 'controller',
            'path' => 'classes/controller/(:scaffold).php',
        ),
        array(
            'type' => 'model',
            'path' => 'classes/model/(:scaffold).php',
        ),
        array(
            'type' => 'views',
            'path' => 'views/admin/(:scaffold)',
        ),
        array(
            'type' => 'views',
            'path' => 'views/(:scaffold)',
        ),
    );

    // Are we overriding existing files.
    static $force = false;

    static $folder_permissions = 0777;
	
    /**
	 * Called by: php oil r movescaffoldtomodule
	 * Moves scaffold files to module.
	 */
	public function run($args = NULL)
	{
        /* We handle here options:
        *  * scaffold alias s: name of the scaffold to move
        *  * module alias m: module to move the scaffold into
        *  * force alias f: do we override existing files ?
        */
        $scaffold = \Cli::option('scaffold', \Cli::option('s'));
        $module = \Cli::option('module', \Cli::option('m'));
        static::$force = \Cli::option('force',
                                      \Cli::option('f', false)
                                     );

        // Checking if the scaffold and module options are
        // defined
        if (is_null($scaffold) || is_null($module)) {
            \Cli::error('Some parameters are missing.');
            \Cli::error('Ex: php oil r moveScaffoldToModule'.
                        ' -scaffold=category -module=blog');
            return;
        }

        $module_path = \Module::exists($module);

        // Is the module found ?
        if ($module_path == null) {
            \Cli::error(
                'The specified module doesn\'t exists!'
            );
            return;
        }

        // Now processing each scaffold file / folders
        foreach (static::$files_to_move as $item) {
            $path = str_replace(
                '(:scaffold)',
                $scaffold,
                $item['path']
            );
            if (file_exists(APPPATH.$path)) {
                /*
                * As each file type must be processed
                * differently, a different method is called
                * depending on the type. For instance, if
                * the file type is controller, we will call
                * the process_controller method.
                */
                static::{'process_'.$item['type']}(
                    $path,
                    $module,
                    $module_path
                );
            }
        }

        // Processing migration as it is a special cases.
        static::process_migration(
            $scaffold,
            $module,
            $module_path
        );
	}

    // How do we process controller files ?
    protected static function process_controller(
        $path,
        $module,
        $module_path
    ) {
        $from_path = APPPATH.$path;
        $to_path = $module_path.$path;

        // If the necessary directory doesn't exist on the
        // module, we create it.
        if (!file_exists(dirname($to_path))) {
            mkdir(
                dirname($to_path),
                static::$folder_permissions,
                true
            );
        }

        if (!file_exists($to_path) || static::$force) {
            // We do the changes we did earlier for the
            // post scaffold controller.
            $content = \File::read($from_path, true);
            $content = str_replace(
                '<?php',
                "<?php
namespace ".ucfirst($module).";
use Controller_Admin;
use Controller_Template;
use Input;
use View;
use Response;
use Session;
",
                $content);

            $content = str_replace(
                'Response::redirect(\'',
                'Response::redirect(\''.$module.'/',
                $content);

            // We write the modified content in the
            // destination file.
            \Cli::write(
                "\tCreating controller: ".$to_path,
                'green'
            );
            file_put_contents($to_path, $content);
        }

        // We delete the original file.
        \Cli::write(
            "\tDeleting controller: ".$from_path,
            'green'
        );
        \File::delete($from_path);
    }

    // How do we process model files ?
    protected static function process_model(
        $path,
        $module,
        $module_path
    ) {
        $from_path = APPPATH.$path;
        $to_path = $module_path.$path;

        // If the necessary directory doesn't exist on the
        // module, we create it.
        if (!file_exists(dirname($to_path))) {
            mkdir(
                dirname($to_path),
                static::$folder_permissions,
                true
            );
        }
        if (!file_exists($to_path) || static::$force) {
            // We do the changes we did earlier for the
            // post scaffold model.
            $content = \File::read($from_path, true);
            $content = str_replace(
                '<?php',
                "<?php
namespace ".ucfirst($module).";
use \Validation as Validation;
",
                $content);

            // We write the modified content in the
            // destination file.
            \Cli::write(
                "\tCreating model: ".$to_path,
                'green'
            );
            file_put_contents($to_path, $content);
        }

        // We delete the original file.
        \Cli::write(
            "\tDeleting model: ".$from_path,
            'green'
        );
        \File::delete($from_path);
    }

    // How do we process view files ?
    protected static function process_views(
        $path,
        $module,
        $module_path
    ) {
        $from_path = APPPATH.$path;
        $to_path = $module_path.$path;

        // If the necessary directory doesn't exist on the
        // module, we create it.
        if (!file_exists($to_path)) {
            mkdir(
                $to_path,
                static::$folder_permissions,
                true
            );
        }

        // Here it is a little different as we are
        // processing each file in the directory.
        $files = \File::read_dir($from_path);
        foreach ($files as $file) {
            $file_from = $from_path.DS.$file;
            $file_to = $to_path.DS.$file;
            if (!file_exists($file_to) || static::$force) {
                // We do the changes we did earlier for the
                // post scaffold views.
                $content = \File::read($file_from, true);
                $content = str_replace(
                'Html::anchor(\'',
                'Html::anchor(\''.$module.'/',
                $content);

                // We write the modified content in the
                // destination file.
                \Cli::write(
                    "\tCreating view: ".$file_to,
                    'green'
                );
                file_put_contents($file_to, $content);
            }
        }

        // We delete the original file.
        \Cli::write(
            "\tDeleting views: ".$from_path,
            'green'
        );
        \File::delete_dir($from_path);
    }

    // How do we process migrations ?
    protected static function process_migration(
        $scaffold,
        $module,
        $module_path
    ) {
        /*
        * Migration files are a special case because the 
        * original and destination file names are not
        * constant. Depending on the existing migrations
        * files, we could have to move the
        * 003_create_category.php migration file from the
        * application to the 002_create_category.php
        * migration file in the module.
        * Moreover, we don't need to do any replacements
        * here.
        */
        $app_migrations_path = APPPATH.'migrations';
        $module_migrations_path = $module_path.'migrations';

        // Getting the list of migrations files in the
        // application.
        $app_migrations = \File::read_dir(
            $app_migrations_path
        );

        // If the migration directory doesn't exists in the
        // module, we create it.
        if (!file_exists($module_migrations_path)) {
            mkdir(
                $module_migrations_path,
                static::$folder_permissions,
                true
            );
        }

        $migration_filename_end = 
            '_create_'.
            \Inflector::pluralize($scaffold).
            '.php';

        $module_migrations = \File::read_dir(
            $module_migrations_path
        );

        // Searching if the migration file already exists
        $module_migration_filename = null;
        $already_exists = false;
        foreach ($module_migrations as $module_migration) {
            if (
                \Str::ends_with(
                    $module_migration,
                    $migration_filename_end
                )
               ) {
                $module_migration_filename = $module_migration;
                $already_exists = true;
                break;
            }
        }

        // If it doesn't, the migration file name generated
        if (is_null($module_migration_filename)) {
            // Finding the destination migration file name.
            $nb_module_migrations = count($module_migrations);
            $module_migration_number = str_pad(
                $nb_module_migrations + 1,
                3,
                '0',
                STR_PAD_LEFT
            );
            $module_migration_filename = 
                $module_migration_number.
                $migration_filename_end;
        }

        // Finding the original migration file
        foreach ($app_migrations as $app_migration) {
            if (
                \Str::ends_with(
                    $app_migration,
                    $migration_filename_end
                )
               ) {
                // Moving it to the destination file.
                $migration_from =
                    $app_migrations_path.DS.$app_migration;
                $migration_to =
                    $module_migrations_path.
                    DS.
                    $module_migration_filename;

                /*
                * If it already exists, the migration is
                * not overriden except if the force option
                * is set.
                */
                if (!$already_exists || static::$force) {
                    \Cli::write(
                        "\tCreating migration: ".$migration_to,
                        'green'
                    );
                    file_put_contents(
                        $migration_to,
                        file_get_contents($migration_from)
                    );
                }
                \Cli::write(
                    "\tDeleting migration: ".$migration_from,
                    'green'
                );

                \File::delete(
                    $migration_from
                );
                break;
            }
        }
    }
}
