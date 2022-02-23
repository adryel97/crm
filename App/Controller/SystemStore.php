<?php
namespace App\Controller;

use App\Model\User;
use League\Plates\Engine;

class SystemStore
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->router = $router;
        $this->user = new User();
        $this->startUser = User::startUser();
        $this->view->addData([
            'router' => $router,
            'idUser' => $this->startUser->id_user,
            'codeUser' => $this->startUser->code_user,
            'title' => 'Estoque'
        ]);
    }

    public function viewStore()
    {
        if ($_SESSION['logged'] == true) {
            echo $this->view->render('store');
        } else {
            $this->router->redirect($this->router->route('login.index'));
        }
    }
    public function viewStoreCreateCar()
    {
        if ($_SESSION['logged'] == true) {
            echo $this->view->render('storeCreateCar');
        } else {
            $this->router->redirect($this->router->route('login.index'));
        }
    }
}
