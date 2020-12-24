<?php
// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';


Autoloader::add_classes(array(
	// Add classes you want to override here
	// Example: 'View' => APPPATH.'classes/view.php',
));

// Register the autoloader
Autoloader::register();

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
Fuel::$env = (isset($_SERVER['FUEL_ENV']) ? $_SERVER['FUEL_ENV'] : Fuel::DEVELOPMENT);

// Initialize the framework with the config file.
Fuel::init('config.php');


// Executed each time the application is requested in
// development mode
if (Fuel::$env == Fuel::DEVELOPMENT && !\Fuel::$is_cli) {
    $view_directory = APPPATH.'views/';
    $extension = '.mustache';
    
    /*
    The following searches for mustache files in APPPATH/views/
    and saves its content into the $template associative array.
    Each key will be the template relative path; for instance,
    if a template is located at
    APPPATH/views/dir_1/file.mustache the value of the key
    will be dir_1/file.
    Each value will be the template content.
    */
    $templates = array();
    $it = new RecursiveDirectoryIterator($view_directory);
    foreach(new RecursiveIteratorIterator($it) as $file)
    {
        if (substr($file, -strlen($extension)) == $extension) {
            // Deducing the key from the filename
            // APPPATH/views/dir_1/file.mustache -> dir_1/file
            $file_key = substr(
                $file,
                strlen($view_directory)
            );
            $file_key = substr(
                $file_key,
                0,
                -strlen($extension)
            );
            
            $templates[$file_key] = file_get_contents($file);
        }
    }
    $template_file_content = 'MyMicroblog.templates = '.
        json_encode($templates).';';
    
    // Saves the templates in the templates.js file
    file_put_contents(
        DOCROOT.'assets/js/templates.js',
        $template_file_content
    );
}
