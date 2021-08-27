<?php
namespace App\Controller;

use League\Plates\Engine;

class RegisterUser
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->view->addData(['router' => $router]);
        $this->router = $router;
    }
    public function viewRegister()
    {
        echo $this->view->render('register');
    }
}
