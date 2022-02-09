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

    public function taskEdit(array $data)
    {
        $idTask = $data['idTask'];
        $nameTaskEdit = $data['nameTaskEdit'];
        $accountTaskEdit = $data['accountTaskEdit'];

        $task = $this->task->findById($idTask);
        $task->name_task = $nameTaskEdit;
        $task->account_task = $accountTaskEdit;
        $taskUpdate = $task->save();
    }

    public function deleteTaskVerification($data)
    {
        $codUser = $data['codeUser'];
        
        
        if ($codUser == $this->startUser->id_user) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function getTaskEdit($data)
    {
        $fkPicture = $_POST['codePicture'];
        $fkUser = $_POST['codeUser'];
        $idTask = $_POST['codeTask'];

        $task = $this->task->find(
            'id_task = :idTask AND  fk_picture = :fkPicture AND fk_user = :fkUser',
            "idTask=$idTask&fkPicture=$fkPicture&fkUser=$fkUser"
        )->fetch();
        
        $dataJson = [
            'id_task' => $task->id_task,
            'fk_status' => $task->fk_status,
            'fk_picture' => $task->fk_picture,
            'fk_user' => $task->fk_user,
            'name_task' => $task->name_task,
            'account_task' => $task->account_task,
            'date_task' => $task->date_task,
            'order_task' => $task->order_task,
        ];

        echo json_encode($dataJson);
    }

    public function alterActive($data)
    {
        $idTask = $data['idTask'];
        $fkStatus = $data['fkStatus'];

        $task = $this->task->findById($idTask);
        $task->fk_status = $fkStatus;
        $taskId = $task->save();
    }

    public function alterList(array $data)
    {
        $idTask = $data['idTask'];
        $position = $data['position'];

        $task = $this->task->findById($idTask);
        $task->order_task = $position;
        $taskId = $task->save();
    }
}
