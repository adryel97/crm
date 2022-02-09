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
 * CONTROL TEMPLATE
 */
$router->get('/control/template', 'TemplateControl:viewControlUser', 'system.controlTemplate');
/**
 * DASHBOARD
 */
$router->get('/dashboard', 'CrmDashboard:viewDashboard', 'system.dashboard');
/**
 * PICTURE
 */
$router->get('/kanban/picture', 'KanbanPicture:viewPicture', 'kanban.picture');
$router->get('/kanban/picture/allPictures', 'KanbanPicture:allPictures', 'kanban.allPictures');
$router->get('/kanban/picture/{namePicture}/{id}', 'KanbanPicture:viewPictureUnique', 'kanban.pictureUnique');
$router->get('/kanban/picture/actual', 'KanbanPicture:actualPicture', 'kanban.pictureActual');
$router->post('/kanban/picture/create', 'KanbanPicture:createPicture', 'kanban.pictureCreate');
/**
 * STATUS
 */
$router->post('/kanban/status/create', 'KanbanStatus:createStatus', 'kanban.statusCreate');
$router->post('/kanban/status/delete/check', 'KanbanStatus:checkDelete', 'kanban.checkDelete');
$router->post('/kanban/status/delete', 'KanbanStatus:deleteStatus', 'kanban.deleteStatus');
$router->get('/kanban/status/{fkPicture}', 'KanbanStatus:getAllStatus', 'kanban.getAllStatus');
/**
 * TASK
 */
$router->get('/kanban/task/{fkPicture}', 'KanbanTask:getAllTask', 'kanban.getAllTask');
$router->post('/kanban/task/create', 'KanbanTask:createTask', 'kanban.taskCreate');
$router->post('/kanban/task/active', 'KanbanTask:alterActive', 'kanban.alterActive');
$router->post('/kanban/task/position', 'KanbanTask:alterList', 'kanban.alterList');
$router->post('/kanban/task/getTask', 'KanbanTask:getTaskEdit', 'kanban.getTask');
$router->post('/kanban/task/editTask', 'KanbanTask:taskEdit', 'kanban.taskEdit');
$router->dispatch();
if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}
