<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

namespace Nos\AppWizard;

class Application_Generator
{
    /**
     * Generates an application from a config file and form input
     *
     * @param $config array  configuration of the application
     * - generation_path: Location of all files needed for the application generation
     * - folders: Folders to create when generating an application
     * - files: callback function
     *   * $root_dir string  Root directory where all files must be generated (likely to be the generated application path)
     *   * $data array  form input
     *   * $config array  generator configuration
     *   * return: array of array, each array defining a file to be generated
     *     - template: generate from this view
     *     - data: view data
     *     - destination
     * - category_types: key => value array defining categories (fields group type). Key is the category identifier. Value
     * is an array containing:
     *   - label
     * - fields: key => value array defining field types. Key is the field type identifier. Value is an array containing:
     *   - label
     *   - on_model_properties: will the field create an associated model property.
     *
     * @param $input array  input from the form (defining fields)
     * @throws \Exception  Can throw exception if a folder exists already.
     */
    public static function generate($config, $input)
    {
        $root_dir = APPPATH.'applications/'.$input['application_settings']['folder'];

        foreach ($config['fields'] as $key => &$field_config) {
            if (!isset($field_config['views'])) {
                $field_config['views'] = array();
            }
            if (!isset($field_config['views']['data_mapping'])) {
                $field_config['views']['data_mapping'] = $config['generation_path'].'/fields/data_mapping/'.$key;
            }
            if (!isset($field_config['views']['crud_name'])) {
                $field_config['views']['crud_name'] = $config['generation_path'].'/fields/crud/name/'.$key;
            }
            if (!isset($field_config['views']['crud_config'])) {
                $field_config['views']['crud_config'] = $config['generation_path'].'/fields/crud/config/'.$key;
            }
            if (!isset($field_config['views']['sql'])) {
                $field_config['views']['sql'] = $config['generation_path'].'/fields/sql/'.$key;
            }
        }

        if (file_exists($root_dir)) {
            throw new \Exception('Folder already exists!');
        }
        mkdir($root_dir, 0775);
        chmod($root_dir, 0775);
        static::generateFolders($root_dir, $config['folders']);
        static::generateFiles($root_dir, $config, $input);
        if (!empty($input['generation_options']['install'])) {
            $application = \Nos\Application::forge($input['application_settings']['folder']);
            $application->install();
        }
    }

    /**
     * View helper that allows to keep a consistent indentation when generating code.
     *
     * @param $pre string  piece of string to be appended before each line (likely to be spaces)
     * @param $str string  code to be indented
     *
     * @return string indented code
     */
    public static function indent($pre, $str)
    {
        $exploded_str = explode("\n", $str);
        foreach ($exploded_str as &$line) {
            $line = $pre.$line;
        }
        return implode("\n", $exploded_str);
    }

    /**
     * Generates folders from a list of folder paths
     *
     * @param $root_dir string  root directory where all folders are generated
     * @param $folders array  list of folder paths
     */
    protected static function generateFolders($root_dir, $folders)
    {
        foreach ($folders as $folder) {
            mkdir($root_dir.DS.$folder, 0775);
            chmod($root_dir.DS.$folder, 0775);
        }
    }

    /**
     * Generates applications files (models, controllers, view), from information on the configuration file and the
     * form values.
     *
     * @param $root_dir string  root director (likely to be the generated application directory)
     * @param $config array  configuration
     * @param $input array  form values
     */
    protected static function generateFiles($root_dir, $config, $input)
    {
        $files = $config['files']($root_dir, $input, $config);
        foreach ($files as $file) {
            if (!is_array($file)) {
                $file = array(
                    'template' => $file,
                    'destination' => $file,
                    'data' => array('data' => $input, 'config' => $config),
                );
            }
            file_put_contents($root_dir.DS.$file['destination'], render($config['generation_path'].'/'.$file['template'], $file['data'], false));
            chmod($root_dir.DS.$file['destination'], 0664);
        }
    }
}
