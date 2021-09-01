<?php
namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;
use CoffeeCode\DataLayer\Connect;

class Task extends DataLayer
{
    /**
     * Task construct
     * @return construct
     */
    public function __construct()
    {
        parent::__construct('tbl_task', ['fk_status', 'fk_picture', 'fk_user', 'name_task'], 'id_task', false);
    }

    public function getTask(int $fkPicture, int $fkUser)
    {
        $sql = 'SELECT * FROM tbl_task WHERE fk_picture = ? AND fk_user = ?';
        $content = Connect::getInstance();
        $con = $content->prepare($sql);
        $con->bindValue(1, $fkPicture);
        $con->bindValue(2, $fkUser);
        $con->execute();
        $response = $con->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }
}
