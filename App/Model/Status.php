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
}
