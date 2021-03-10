<?php
require_once 'classes//controller.php';
require_once 'models/product.php';
class ProductController extends Controller
{
    public function Index()
    {
        $products = (new Product())->all();



        $this->render('allproducts',['products' => $products]);
    }
}