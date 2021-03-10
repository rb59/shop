<?php
require_once 'classes/Dispatcher.php';

class Routes
{
    function __construct()
    {
        (new Dispatcher())
        ->routing('/products', function($params)
        {
            (new ProductController())->Index($params); 
        })
        ->routing('/product/{id}', function($params)
        {
            (new ProductController())->Show($params); 
        })
        ->dispatch();
    }
}
