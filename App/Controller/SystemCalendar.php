<?php
namespace App\Controller;

use App\Model\User;
use PhpUtils\RandString;
use League\Plates\Engine;

class SystemCalendar
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->router = $router;
        $this->user = new User();
        $this->startUser = User::startUser();
        $this->view->addData(['router' => $router, 'idUser' => $this->startUser->id_user, 'title' => 'Dashboard']);
    }

    public function viewCalendar()
    {
        if ($_SESSION['logged'] == true) {
            echo $this->view->render('calendar');
        } else {
            $this->router->redirect($this->router->route('login.index'));
        }
    }
}
