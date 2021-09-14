<?php
namespace App\Controller;

use App\Model\User;
use League\Plates\Engine;

class Kanban
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->view->addData(['router' => $router]);
        $this->router = $router;
        $this->user = new User();
        $this->startUser = User::startUser();
    }
}
