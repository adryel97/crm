<?php
namespace App\Controller;

use App\Model\User;
use League\Plates\Engine;

class TemplateControl
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->router = $router;
        $this->user = new User();
        $this->startUser = User::startUser();
        $this->view->addData(['router' => $router]);
    }

    public function viewControlUser()
    {
        $data = $this->startUser;
        echo json_encode($data);
    }
    public function userControl()
    {
        $data = $this->startUser;
        return $data;
    }
}
