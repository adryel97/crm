<?php
namespace App\Controller;

use League\Plates\Engine;

class CrmDashboard
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
    }
    public function viewDashboard()
    {
        if ($_SESSION['logged'] == true) {
            echo $this->view->render('dashboard');
        }
    }
}
