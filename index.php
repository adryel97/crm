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
/**
 * LOGIN ONLINE
 */
$router->post('/', 'LoginUser:loginUser', 'login.user');


$router->get('/dashboard', 'CrmDashboard:viewDashboard', 'system.dashboard');
/**
 * PICTURE
 */
$router->get('/kanban/picture/{id}', 'KanbanPicture:viewPicture', 'kanban.picture');
$router->post('/kanban/picture/create', 'KanbanPicture:createPicture', 'kanban.pictureCreate');
/**
 * STATUS
 */
$router->post('/kanban/status/create', 'KanbanStatus:createStatus', 'kanban.statusCreate');
$router->get('/kanban/status/{fkPicture}', 'KanbanStatus:getAllStatus', 'kanban.getAllStatus');
/**
 * TASK
 */
$router->post('/kanban/task/create', 'KanbanTask:createTask', 'kanban.taskCreate');
$router->get('/kanban/task/{fkPicture}', 'KanbanTask:getAllTask', 'kanban.getAllTask');
$router->post('/kanban/task/active', 'KanbanTask:alterActive', 'kanban.alterActive');
$router->post('/kanban/task/position', 'KanbanTask:alterList', 'kanban.alterList');
$router->dispatch();
if ($router->error()) {
    echo 'ESSA ROTA NÃO EXISTE AINDA :( ' . $router->error();
}
