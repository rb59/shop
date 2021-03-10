<?php
require_once "classes/model.php";
class Product extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('products');
    }
}