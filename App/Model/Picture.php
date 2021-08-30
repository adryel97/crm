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
}
