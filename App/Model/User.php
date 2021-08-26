<?php
namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;
use CoffeeCode\DataLayer\Connect;

class User extends DataLayer
{
    /**
    * User construct
    */
    public function __construct()
    {
        parent::__construct('tbl_user', ['name_user', 'email_user', 'password_user'], 'id_user', false);
    }
}
