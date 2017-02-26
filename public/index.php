<?php
use Prim\Application;
use Tasks\Controller\Error;

// Project's folder path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR); // /var/www/
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR); // /var/www/app

// Composer autoloading
require ROOT . 'vendor/autoload.php';

// load application config (error reporting etc.)
require APP . 'config/config.php';

if(ENV == 'prod') {
    define('URL_RELATIVE_BASE', $_SERVER['REQUEST_URI']);
    define('URL_BASE', '');
}
else {
    $dirname = str_replace('public', '', dirname($_SERVER['SCRIPT_NAME']));
    define('URL_RELATIVE_BASE', str_replace($dirname, '', $_SERVER['REQUEST_URI']));
    define('URL_BASE', $dirname);
}

define('URL_PROTOCOL', !empty($_SERVER['HTTPS'])?'https://':'http://');
define('URL_DOMAIN', $_SERVER['SERVER_NAME']);

define('URL', URL_PROTOCOL . URL_DOMAIN . URL_BASE);

try {
    $app = new Application($_SERVER['REQUEST_METHOD'], URL_RELATIVE_BASE);
} catch (\Exception $e) {
    $error = new Error;

    echo $error->page404($e);
}