<?php
require_once 'classes/Dispatcher.php';

class Routes
{
    function __construct()
    {
        (new Dispatcher())
            ->routing('/', function ()
            {
                (new ProductController())->Index(); 
            })
            ->routing('/products', function()
            {
                (new ProductController())->Index(); 
            })
            ->routing('/product/{id}', function($params)
            {   
                (new ProductController())->Show($params); 
            })
            ->routing('/cart/add', function ()
            {
                (new CartController())->add();    
            })
            ->routing('/login', function()
            {
                (new UserController)->login();
            })
            ->routing('/register', function()
            {
                (new UserController)->create();
            })
            ->routing('/user/create',function()
            {
                (new UserController)->store();
            })
            ->routing('/logout',function()
            {
                (new UserController)->Logout();
            })
            ->routing('/mycart', function()
            {
               (new CartController)->Index();
            })
            ->routing('/purchases',function()
            {
               (new CartController)->purchased();
            })
            ->dispatch();
    }
}
