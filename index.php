<?php
require 'vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

$router->namespace('App\Controller');
$router->get('/', 'LoginUser:viewLogin', 'login.index');
$router->get('/register', 'RegisterUser:viewRegister');
$router->post('/register/createUser', 'RegisterUser:createUser', 'createUser.user');

$router->post('/system', 'LoginUser:loginUser', 'login.user');
$router->dispatch();
if ($router->error()) {
    echo 'ESSA ROTA NÃO EXISTE AINDA :( ' . $router->error();
}
