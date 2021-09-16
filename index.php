<?php
require 'vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

/**
 * Create user and logic login user
 */
$router->namespace('App\Controller');
$router->get('/', 'LoginUser:viewLogin', 'login.index');
/**
 * REGISTER USER
 */
$router->get('/register', 'RegisterUser:viewRegister');
$router->post('/register/createUser', 'RegisterUser:createUser', 'createUser.user');
/**
 * ERRORS
 */
$router->get('/ops/{errorcode}', 'ControlRouter:viewErrors');
/**
 * System router
 */
$router->post('/', 'LoginUser:logoutUser', 'logout.user');
$router->namespace('App\Controller')->group('system');
/**
 * LOGIN ONLINE
 */
$router->post('/', 'LoginUser:loginUser', 'login.user');
/**
 * DASHBOARD
 */
$router->get('/dashboard', 'CrmDashboard:viewDashboard', 'system.dashboard');
/**
 * PICTURE
 */
$router->get('/kanban/picture', 'KanbanPicture:viewPicture', 'kanban.picture');
$router->get('/kanban/picture/{id}', 'KanbanPicture:viewPictureUnique', 'kanban.pictureUnique');
$router->post('/kanban/picture/create', 'KanbanPicture:createPicture', 'kanban.pictureCreate');
$router->get('/kanban/picture/actual', 'KanbanPicture:actualPicture', 'kanban.pictureActual');
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
    $router->redirect("/ops/{$router->error()}");
}
