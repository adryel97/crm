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
}
