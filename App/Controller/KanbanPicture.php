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
        $this->view->addData(['router' => $router]);
        $this->router = $router;
        $this->picture = new Picture();
        $this->user = new User();
        $this->startUser = User::startUser();
    }

    public function viewPicture()
    {
        echo $this->view->render('picture', ['user'=>$this->startUser]);
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
}
