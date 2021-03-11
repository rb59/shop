<?php
require_once 'models/cart.php';
class CartController extends Controller
{
    public function Index()
    {
        
    }

    public function add()
    {
        echo $_POST['id'];
    }
}