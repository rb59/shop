<?php
class Rating extends Model
{
    function __construct()
    {
        parent::__construct();
        $this->setTable('ratings');
    }
}