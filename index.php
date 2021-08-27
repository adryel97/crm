<?php
require 'vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

$router->namespace('App\Controller');
$router->get('/', 'LoginUser:viewLogin');
$router->get('/register', 'RegisterUser:viewRegister');
$router->dispatch();
if ($router->error()) {
    echo 'ESSA ROTA NÃO EXISTE AINDA :( ' . $router->error();
}
