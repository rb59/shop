<?php
require_once "classes/model.php";
class Cart extends Model
{
    function __construct()
    {
        parent::__construct();
        $this->setTable('carts');
    }
}