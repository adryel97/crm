<?php
require 'vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

/**
 * Create user and logic login user
 */
$router->namespace('App\Controller');
$router->get('/', 'LoginUser:viewLogin', 'login.index');
$router->get('/register', 'RegisterUser:viewRegister');
$router->post('/register/createUser', 'RegisterUser:createUser', 'createUser.user');

/**
 * System router
 */
$router->namespace('App\Controller')->group('system');
$router->post('/', 'LoginUser:loginUser', 'login.user');
$router->get('/kanban/picture/{id}', 'KanbanPicture:viewPicture', 'kanban.picture');
$router->post('/kanban/picture/create', 'KanbanPicture:createPicture', 'kanban.pictureCreate');
$router->post('/kanban/status/create', 'KanbanStatus:createStatus', 'kanban.statusCreate');
$router->dispatch();
if ($router->error()) {
    echo 'ESSA ROTA NÃO EXISTE AINDA :( ' . $router->error();
}
