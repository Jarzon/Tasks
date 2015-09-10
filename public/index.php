<?php
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

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

$router = new RouteCollector();

include(APP . 'config/routing.php');

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Dispatcher($router->getData());

$uri = str_replace(URL_SUB_FOLDER, '', $_SERVER['REQUEST_URI']);

try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($uri, PHP_URL_PATH));

    // Print out the value returned from the dispatched function
    echo $response;

    if(ENV == 'dev') echo microtime(true) - $start;
} catch (\Exception $e) {
    $error = new \Tasks\Controller\Error;

    echo $error->page404($e);
}

