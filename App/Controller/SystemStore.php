<?php
namespace App\Controller;

use App\Model\User;
use App\Model\Store;
use League\Plates\Engine;
use Cocur\Slugify\Slugify;
use PhpUtils\RandString;

class SystemStore
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->router = $router;
        $this->user = new User();
        $this->slugify = new Slugify();
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

    public function sendCar($data)
    {
        $dataImg = $data['dataImages'];
        $arrayFile = [];
        $formDataPost = $data['formData'];

        $nameCar = $formDataPost['brand'] . ' ' . $formDataPost['model'];
        $arrayForm = [
            "nameCar" => $nameCar,
            "nameCarSlug" => $this->slugify->slugify($nameCar),
            "codCar" => RandString::getRandString(10),
        ];

        $resultForm = array_merge($formDataPost, $arrayForm);

        for ($i=0; $i < count($dataImg); $i++) {
            $img = $dataImg[$i]['imagem'];
            $extensao = $dataImg[$i]['extensao'];
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
        $store->category_car = $resultForm['category'];
        $store->brand_car = $resultForm['brand'];
        $store->model_car = $resultForm['model'];
        $store->year_car = $resultForm['year'];
        $store->plate_car = $resultForm['plate'];
        $store->color_car = $resultForm['color'];
        $store->color_hex_car = $resultForm['colorHexa'];
        $store->port_car = $resultForm['port'];
        $store->km_car = $resultForm['km'];
        $store->value_car = $resultForm['valueCar'];
        $store->value_promotion = $resultForm['valuePromotion'];
        $store->value_transference = $resultForm['valueTransference'];
        $store->note_car = $resultForm['noteCar'];
        $store->photo_car = $jsonFiles;
        $store->name_car = $resultForm['nameCar'];
        $store->name_slug_car = $resultForm['nameCarSlug'];
        $store->code_car = $resultForm['codCar'];
        $store->code_brand_fipe_car = $resultForm['brandCod'];
        $store->code_model_fipe_car = $resultForm['modelCod'];
        $store->code_year_fipe_car = $resultForm['yearCod'];
        $store->save();
    }
}
