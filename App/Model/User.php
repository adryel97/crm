<?php
namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;
use CoffeeCode\DataLayer\Connect;

class User extends DataLayer
{
    /**
     * User construct
     * @return construct
     */
    public function __construct()
    {
        parent::__construct('tbl_user', ['name_user', 'email_user', 'password_user'], 'id_user', false);
    }

    /**
     * @return conection
     * or
     * @return int
     */
    public function conectUser()
    {
        $sql = 'SELECT * FROM tbl_user WHERE email_user = ? AND password_user = ?';
        $content = Connect::getInstance();
        $con = $content->prepare($sql);
        $con->bindValue(1, $_SESSION['email']);
        $con->bindValue(2, md5($_SESSION['password']));
        $con->execute();

        $userRow = $con->fetch(\PDO::FETCH_OBJ);

        if (isset($userRow->email_user) && isset($userRow->password_user)) {
            if ($userRow->email_user == $_SESSION['email'] && $userRow->password_user == md5($_SESSION['password'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
