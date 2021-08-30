<?php
namespace App\Controller;

use App\Model\Picture;
use League\Plates\Engine;

class KanbanPicture
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->view->addData(['router' => $router]);
        $this->router = $router;
        $this->user = new Picture();
    }

    public function viewPicture()
    {
        echo $this->view->render('picture');
    }
}
