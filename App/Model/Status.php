<?php
namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;
use CoffeeCode\DataLayer\Connect;

class Status extends DataLayer
{
    /**
     * Status construct
     * @return construct
     */
    public function __construct()
    {
        parent::__construct('tbl_status', ['fk_user', 'name_status', 'color_status'], 'id_status', false);
    }

    public function getStatus(int $fkPicture, int $fkUser)
    {
        $sql = 'SELECT * FROM tbl_status WHERE fk_picture = ? AND fk_user = ?';
        $content = Connect::getInstance();
        $con = $content->prepare($sql);
        $con->bindValue(1, $fkPicture);
        $con->bindValue(2, $fkUser);
        $con->execute();
        $response = $con->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }
}
