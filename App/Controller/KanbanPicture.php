<?php
namespace App\Controller;

use App\Model\User;
use App\Model\Picture;
use League\Plates\Engine;

class KanbanPicture
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->router = $router;
        $this->picture = new Picture();
        $this->user = new User();
        $this->startUser = User::startUser();
        $this->view->addData(['router' => $router, 'idUser' => $this->startUser->id_user]);
    }

    public function viewPicture()
    {
        if ($_SESSION['logged'] == true) {
            echo $this->view->render('picture');
        } else {
            $this->router->redirect($this->router->route('login.index'));
        }
    }

    /**
     * @return view
     */
    public function viewPictureUnique($data)
    {
        if ($_SESSION['logged'] == true) {
            $id = $data['id'];
            $namePicure = $data['namePicture'];
            $picture = $this->picture->findById($id);

            echo $this->view->render('pictureUnique', [
                'user'=> $this->startUser,
                'idPicture' => $id,
                'namePicture' => $picture->name_picture
            ]);
        } else {
            $this->router->redirect($this->router->route('login.index'));
        }
    }

    /**
     * Create new user
     * @param array
     * @return string true or false
     */
    public function createPicture(array $data) : void
    {
        try {
            $fkUser = $data['fkUser'];
            $pictureName = $data['picture'];

            $picture = $this->picture;
            $picture->fk_user = $fkUser;
            $picture->name_picture = $pictureName;
            $picture->save();

            echo "true";
        } catch (\Exception $e) {
            echo $e;
        }
    }

    /**
     * Get picture actual
     * @return json or false
     */
    public function actualPicture()
    {
        if ($_SESSION['logged'] == true) {
            $idUser = $this->startUser->id_user;
            $picture = $this->picture;
            $actualPicture = $picture->find("fk_user = :fk_user", "fk_user=$idUser")->limit(1)->order("date_picture DESC")->fetch(true);
            $arrPicture = [];
            if ($actualPicture != null) {
                foreach ($actualPicture as $value) {
                    $idPicture = $value->id_picture;
                    $namePicture = $value->name_picture;
                }

                array_push($arrPicture, ['namePicture' => $namePicture, 'idPicture' => $idPicture]);
                echo json_encode($arrPicture);
            } else {
                echo 'false';
            }
        } else {
            $this->router->redirect($this->router->route('login.index'));
        }
    }

    /**
     * Get all pictures
     * @return array
     */
    public function allPictures()
    {
        if ($_SESSION['logged'] == true) {
            $idUser = $this->startUser->id_user;
            $picture = $this->picture;
            $data = $picture->getPictures($idUser);

            echo json_encode($data);
        } else {
            $this->router->redirect($this->router->route('login.index'));
        }
    }
}
