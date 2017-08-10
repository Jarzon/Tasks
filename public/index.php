<?php
use Prim\Application;
use Prim\Container;

// Project's folder path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR); // /var/www/
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR); // /var/www/app

// Composer autoloading
require ROOT . 'vendor/autoload.php';

// load application config (error reporting etc.)
require APP . 'config/config.php';


    $container = new Container(include(APP . '/config/container.php'));

    $app = new Application($container, $container->getController('Tasks\BasePack\Controller\Error'));