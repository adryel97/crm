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

        $login = $this->user->conectUser($_SESSION['email'], md5($_SESSION['password']));

        if ($login == true) {
            $_SESSION['logged'] = true;
            $this->dashboard->viewDashboard();
        } else {
            $this->router->redirect(url());
        }
    }
}
