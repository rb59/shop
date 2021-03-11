<?php
require_once 'models/product.php';
class ProductController extends Controller
{
    public function Index()
    {
        $products = (new Product())->all();
        $this->render('allproducts',['products' => $products]);
    }

    public function Show($params)
    {
        $id = $params['id'];
        $product = (new Product())->id($id);
        $this->render('product',['product' => $product]);
    }
}