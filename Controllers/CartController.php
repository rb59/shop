<?php
require_once 'models/cart.php';
class CartController extends Controller
{
    public function Index()
    {
        $this->render('cart');
    }

    public function add()
    {
        echo $_POST['id'];
    }

    public function purchased()
    {
        $this->render('purchases');
    }
}