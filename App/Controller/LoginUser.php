<?php
namespace App\Controller;

use App\Model\User;
use League\Plates\Engine;
use App\Controller\CrmDashboard;

class LoginUser
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->view->addData(['router' => $router]);
        $this->router = $router;
        $this->user = new User();
        $this->dashboard = new CrmDashboard();
    }
    public function viewLogin()
    {
        echo $this->view->render('login');
    }

    public function loginUser($data)
    {
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['logged'] = $_SESSION['logged'] ?? false;

        $this->dashboard->viewDashboard();

        if ($_SESSION['logged'] == false) {
            exit;
        }
        /*
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['logged'] = $_SESSION['logged'] ?? false;

        $login = $this->user->conectUser($_SESSION['email'], $_SESSION['password']);

        if ($_SESSION['logged'] == true) {
            $user = User::startUser();
            echo $this->view->render('dashboard', ['user' => $user]);
        } else {
            $this->router->redirect(url());
        }
        */
    }
}
