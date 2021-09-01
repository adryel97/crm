<?php
namespace App\Controller;

use App\Model\User;
use App\Model\Task;
use League\Plates\Engine;

class KanbanTask
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->view->addData(['router' => $router]);
        $this->router = $router;
        $this->task = new Task();
        $this->user = new User();
        $this->startUser = User::startUser();
    }

    /**
     * @param array $data
     * @return bolean
     * or
     * @return error
     */
    public function createTask(array $data)
    {
        try {
            $fkUser = $data['fkUser'];
            $fkPicture = $data['fkPicture'];
            $fkStatus = $data['fkStatus'];
            $nameTask = $data['nameTask'];
            $account = $data['accountTask'];

            $task = $this->task;
            $task->fk_status = $fkStatus;
            $task->fk_picture = $fkPicture;
            $task->fk_user = $fkUser;
            $task->name_task = $nameTask;
            $task->account_task = $account;
            $task->save();

            echo "true";
        } catch (\Exception $e) {
            echo $e;
        }
    }
    /**
     * @param array $data
     * @return json
     */
    public function getAllTask(array $data)
    {
        $fkPicture = $data['fkPicture'];
        $fkUser =  $this->startUser->id_user;
        $dataTask =  $this->task->getTask($fkPicture, $fkUser);

        echo json_encode($dataTask);
    }
}
