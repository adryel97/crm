<?php
namespace App\Controller;

use League\Plates\Engine;

class CrmDashboard
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->view->addData(['router' => $router]);
        $this->router = $router;
    }

    public function viewDashboard()
    {
        if ($_SESSION['logged'] == true) {
            echo $this->view->render('dashboard');
        } else {
            $this->router->redirect(url());
        }
    }
}
