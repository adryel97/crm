<?php
require 'vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

$router->namespace('App\Controller');
$router->get('/', 'LoginUser:viewLogin', 'login.index');
$router->get('/register', 'RegisterUser:viewRegister');
$router->post('/register/createUser', 'RegisterUser:createUser', 'createUser.user');


$router->namespace('App\Controller')->group('system');
$router->post('/', 'LoginUser:loginUser', 'login.user');
$router->get('/kanban', 'KanbanPicture:viewPicture', 'kanban.picture');
$router->dispatch();
if ($router->error()) {
    echo 'ESSA ROTA NÃO EXISTE AINDA :( ' . $router->error();
}
