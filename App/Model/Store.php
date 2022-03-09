<?php
namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;
use CoffeeCode\DataLayer\Connect;

class Store extends DataLayer
{
    /**
     * Picture construct
     * @return construct
     */
    public function __construct()
    {
        parent::__construct('tbl_car', ['name_car'], 'id', false);
    }
}
