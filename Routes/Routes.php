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
            ->routing('/login', function()
            {
                (new LoginController)->index();
            })
            ->routing('/user/login',function()
            {
                (new LoginController)->login();
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
                (new LoginController)->Logout();
            })
            ->routing('/mycart', function()
            {
                (new CartController)->Index();
            })
            ->routing('/purchases',function()
            {
                (new CartController)->purchased();
            })
            ->routing(('/add/{id}'),function($params)
            {
                (new CartController)->add($params);
            })
            ->dispatch();
    }
}
