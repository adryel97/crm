<?php
session_cache_limiter('private_no_expire');
session_start();
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
define('ROOT', 'http://www.crm.local');
define('DATA_LAYER_CONFIG', [
    'driver' => 'mysql',
    'host' => 'localhost',
    'port' => '3306',
    'dbname' => 'db_crm',
    'username' => 'root',
    'passwd' => '',
    'options' => [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
function url(string $uri = null): string
{
    if ($uri) {
        return ROOT . "/{$uri}";
    }
    return ROOT;
}
