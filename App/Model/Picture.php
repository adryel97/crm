<?php
namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;
use CoffeeCode\DataLayer\Connect;

class Picture extends DataLayer
{
    /**
     * Picture construct
     * @return construct
     */
    public function __construct()
    {
        parent::__construct('tbl_picture', ['fk_user', 'name_picture'], 'id_picture', false);
    }

    public function getPictures(int $idUser)
    {
        $sql = 'SELECT * FROM tbl_picture WHERE fk_user = ? ORDER BY date_picture DESC';
        $content = Connect::getInstance();
        $con = $content->prepare($sql);
        $con->bindValue(1, $idUser);
        $con->execute();
        $response = $con->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }
}
