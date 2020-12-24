<?php
$control_key = 'YOUR_KEY';

if ($_GET['key'] == $control_key) {
    // Fuel initialization (inspired from index.php)
    define('DOCROOT', __DIR__.DIRECTORY_SEPARATOR);
    define('APPPATH', realpath(__DIR__.'/../fuel/app/').DIRECTORY_SEPARATOR);
    define('PKGPATH', realpath(__DIR__.'/../fuel/packages/').DIRECTORY_SEPARATOR);
    define('COREPATH', realpath(__DIR__.'/../fuel/core/').DIRECTORY_SEPARATOR);
    defined('FUEL_START_TIME') or define('FUEL_START_TIME', microtime(true));
    defined('FUEL_START_MEM') or define('FUEL_START_MEM', memory_get_usage());
    require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';
    class_alias('Fuel\\Core\\Autoloader', 'Autoloader');
    require APPPATH.'bootstrap.php';
    
    \Migrate::latest('auth', 'package');
    \Migrate::latest('blog', 'module');
    \Migrate::latest();
    //\Migrate::version(0);
    echo 'Migrations have been successfully executed';
} else {
    sleep(1);
    echo 'Key is incorrect';
}