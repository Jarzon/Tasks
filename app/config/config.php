<?php
$name = 'Tasks';
$domain = 'tasks.localhost';

return [
    'project_name' => $name,

    'db_enable' => true,
    'db_type' => 'mysql',
    'db_host' => '127.0.0.1',
    'db_name' => $name,
    'db_user' => 'root',
    'db_password' => '',
    'db_charset' => 'utf8',
    'db_options' => [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
    ],

    'environment' => 'dev',
    'debug' => true,

    'error_mail' => "contact@$domain",
    'error_mail_from' => "$name <contact@$domain>",

    'url_protocol' => !empty($_SERVER['HTTPS'])? 'https://': 'http://',
    'url_domain' => $domain
];