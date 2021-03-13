<?php
require_once 'models/cart.php';
class CartController extends Controller
{
    public function Index()
    {
        $this->render('cart');
    }

    public function add($params)
    {
        if(!isset($_SESSION['id']))
        {
            echo "
                    <script type=\"text/javascript\">
                        location.href = '". PATH ."/login';
                    </script>
                ";
            exit;
        } 
        $cart = new Cart();
        $cart->setOwner($_SESSION['id']);
        $cart->setOwner_balance($_SESSION['balance']);
        $product = $params['id'];
        $quantity = $this->getPost('quantity');
        if ($this->existPost('scale')) 
        {
            if ($this->getPost('scale') == 2) {
                $quantity /= 1000;
            }
        }
        if(!$cart->hasCart())
        {
            $cart->create();
        }
        $cart->addToCart($product,$quantity);

    }

    public function purchased()
    {
        $this->render('purchases');
    }
}