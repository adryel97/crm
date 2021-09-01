<?php
namespace App\Controller;

use App\Model\User;
use App\Model\Status;
use League\Plates\Engine;

class KanbanStatus
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->view->addData(['router' => $router]);
        $this->router = $router;
        $this->status = new Status();
        $this->user = new User();
        $this->startUser = User::startUser();
    }

    /**
     * @param array $data
     * @return bolean
     * or
     * @return error
     */
    public function createStatus(array $data)
    {
        try {
            $fkUser = $data['fkUser'];
            $fkPicture = $data['fkPicture'];
            $title = $data['status'];
            $color = $data['btnradio'];

            $status = $this->status;
            $status->fk_picture = $fkPicture;
            $status->fk_user = $fkUser;
            $status->name_status = $title;
            $status->color_status = $color;
            $status->save();

            echo "true";
        } catch (\Exception $e) {
            echo $e;
        }
    }

    /**
     * @param array $data
     * @return json
     */
    public function getAllStatus(array $data)
    {
        $fkPicture = $data['fkPicture'];
        $fkUser =  $this->startUser->id_user;
        $dataStatus =  $this->status->getStatus($fkPicture, $fkUser);

        echo json_encode($dataStatus);
    }
}
