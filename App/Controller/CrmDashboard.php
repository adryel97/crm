<?php
namespace App\Controller;

use App\Model\User;
use PhpUtils\RandString;
use League\Plates\Engine;

class CrmDashboard
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

    public function viewDashboard()
    {
        if ($_SESSION['logged'] == true) {
            echo $this->view->render('dashboard');
        } else {
            $this->router->redirect($this->router->route('login.index'));
        }
    }

    public function testRand()
    {
        echo RandString::getRandString(10);
    }
}
