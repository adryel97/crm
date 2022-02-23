<?php
namespace App\Controller;

use App\Model\User;
use PhpUtils\RandString;
use League\Plates\Engine;

class SystemDashboard
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->router = $router;
        $this->user = new User();
        $this->startUser = User::startUser();
        $this->view->addData([
            'router' => $router,
            'idUser' => $this->startUser->id_user,
            'codeUser' => $this->startUser->code_user,
            'title' => 'Dashboard'
        ]);
    }

    public function viewDashboard()
    {
        if ($_SESSION['logged'] == true) {
            echo $this->view->render('dashboard');
        } else {
            $this->router->redirect($this->router->route('login.index'));
        }
    }
}
