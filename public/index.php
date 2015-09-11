<?php
use Prim\Core\Application;

$start = microtime(true);

// set a constant that holds the project's folder path, like "/var/www/".
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);
define('PRIM', ROOT . 'Prim' . DIRECTORY_SEPARATOR);

// Autoloading
require APP . 'autoload.php';
require PRIM . 'autoload.php';

// Composer autoloading
require ROOT . 'vendor/autoload.php';

// load application config (error reporting etc.)
require APP . 'config/config.php';


require PRIM . 'Utilities/functions.php';

if(ENV == 'dev') {
    require PRIM . 'Utilities/helper.php';
}

$app = new Application();

if(ENV == 'dev') echo microtime(true) - $start;