<?php
namespace App\Controller;

use App\Model\User;
use League\Plates\Engine;

class LoginUser
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->view->addData(['router' => $router]);
        $this->router = $router;
        $this->user = new User();
    }
    public function viewLogin()
    {
        echo $this->view->render('login');
    }

    public function viewDashboard()
    {
        echo $this->view->render('dashboard');
    }

    public function loginUser($data)
    {
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $data['password'];
        $login = $this->user->conectUser();
        if ($login == true) {
            echo $this->view->render('dashboard');
        } else {
            $this->router->redirect(url());
        }
    }
}
