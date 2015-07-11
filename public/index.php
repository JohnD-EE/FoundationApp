<?php

$maintenance_mode = false;
if($maintenance_mode){
    $server = $_SERVER;
    $allowed_ips = ['90.152.2.154'];
    if(isset($server) && !empty($server) && isset($server['APP_ENV']) && $server['APP_ENV'] === 'uat'){
        if(isset($server['HTTP_X_FORWARDED_FOR']) && in_array($server['HTTP_X_FORWARDED_FOR'], $allowed_ips)) {

        }elseif(isset($server['REMOTE_ADDR']) && in_array($server['REMOTE_ADDR'], $allowed_ips)){

        }
        elseif(!isset($server['REMOTE_ADDR']) && !isset($server['HTTP_X_FORWARDED_FOR'])){

        }
        else{
            require 'index_maintenance.php';
            exit;
        }
    }

}

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set('Europe/London');

define('ZF_CLASS_CACHE', 'data/cache/classes.php.cache');
if (file_exists(ZF_CLASS_CACHE)) include ZF_CLASS_CACHE;

$defaultTier = "";
$env = getenv('APP_ENV') ?: getenv('devTier') ?: $defaultTier;

if(!$env) {
    $msg = sprintf("environment var APP_ENV does not have a valid value: %s", $env);
    error_log($msg);
    throw new UnexpectedValueException($msg);
}

$devMode = ($env=='local'  || $env=='dev_trunk');
define('APP_ENV', $env);
define('DEV_MODE', $devMode);
if(!$devMode) {
    include 'error_handler.php';
}

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// Setup autoloading
//require 'vendor/autoload.php';
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();