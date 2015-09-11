<?php

/**
 * Error reporting
 */
define('ENV', 'dev');

if (ENV == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

/**
 * URL config
 */

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);

if(ENV == 'dev') define('URL_SUB_FOLDER', '/tasks/');
else define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));

define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

/**
 * Database config
 */
define('DB_ENABLE', true);
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'tasks');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');