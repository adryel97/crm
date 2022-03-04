<?php
namespace App\Controller;

use App\Model\User;
use App\Model\Store;
use League\Plates\Engine;

class SystemStore
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->router = $router;
        $this->user = new User();
        $this->store = new Store();
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

    private function uploadImageCar($img, $i, $extensao)
    {
    }

    public function sendCar($data)
    {
        $data = $data['data'];
        $arrayFile = [];
        
        for ($i=0; $i < count($data); $i++) {
            $img = $data[$i]['imagem'];
            $extensao = $data[$i]['extensao'];
            $folderPath = "img/upload-img-cars/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $dateFile = date('d-m-y');
            $timeFile = date('H-m-s');

            $file = $folderPath . uniqid().'-'.$dateFile.'_'.$timeFile.'.'.$extensao;

            $extensaoFilter = ["jpg", "jpeg", "png"];

            $teste = array('imgs' => $file);
            if (in_array($extensao, $extensaoFilter)) {
                file_put_contents($file, $image_base64);
            }
            array_push($arrayFile, $file);
        }

        $jsonFiles = json_encode($arrayFile);

        $store = $this->store;
        $store->images = $jsonFiles;
        $store->save();
    }


    public function findCar()
    {
        $store = $this->store;
        $imgs = $store->find()->fetch();
        echo $imgs->images;
    }
}
