<?php
class Cart extends Model
{
    private $owner;
    private $owner_balance;
    private $total;
    
    function __construct()
    {
        parent::__construct();
        $this->setTable('carts');
    }

    public function addToCart($product,$quantity)
    {        
        if ($quantity <= 0) 
        {
            $this->helper->Alert('error','You must add at least one product');
        }
        else
        {
            $cart = $this->getCart();
            $cartProd = $this->prodInCart($cart['id'],$product);
            if ( !empty($cartProd) ) 
            {
                $quantity += $cartProd['quantity'];
                $this->db->query("UPDATE cart_products SET quantity = {$this->helper->Filter($quantity)} WHERE id = {$cartProd['id']}");
            }
            else
            {
                $this->db->query("INSERT INTO cart_products (quantity,products_id,carts_id) VALUES ({$quantity},{$product},{$cart['id']}) ");
            }
            $this->updateAmount();
            $this->helper->Alert('success','Added to cart');
        }
        return False;
    }

    public function removeProd($product,$quantity)
    {        
        if ($quantity <= 0) 
        {
            $this->helper->Alert('error','You must remove at least one product');
        }
        else
        {
            $cart = $this->getCart();
            $cartProd = $this->prodInCart($cart['id'],$product);
            if ( $cartProd['quantity'] > $quantity ) 
            {
                $quantity = $cartProd['quantity'] - $quantity;
                $this->db->query("UPDATE cart_products SET quantity = {$this->helper->Filter($quantity)} WHERE id = {$cartProd['id']}");
            }
            else
            {
                $this->db->query("DELETE FROM cart_products WHERE id = {$cartProd['id']} ");
            }
            $this->updateAmount();
            $this->helper->Alert('success','Removed from cart');
        }
        return False;
    }

    public function updateAmount()
    {
        $amount = 0;
        $cart = $this->getCart();
        $query = $this->db->query("SELECT products.price as price, cart_products.quantity as quantity FROM cart_products
        INNER JOIN products on products.id = cart_products.products_id WHERE cart_products.carts_id = {$cart['id']}");
        $data = $query->fetchAll();
        if(!empty($data))
        {
            foreach ($data as $products) 
            {
                $amount += $products['quantity'] * $products['price'];
            }
        }          
        $this->update($cart['id'],['total_amount' => $amount]);
        return;
    }

    public function hasCart()
    {
        $cart = $this->db->query("SELECT COUNT(*) FROM carts WHERE users_id = $this->owner AND status = 'active'")->fetchColumn();
        if($cart > 0)
        {
            return True;
        }
        return False;
    }

    public function prodInCart($cart,$product)
    {
        $prod = $this->db->query("SELECT * FROM cart_products WHERE carts_id = $cart AND products_id = $product")->fetch();
        return $prod;
    }

    public function create()
    {
        $query = $this->db->prepare("INSERT INTO carts (balance_before,users_id) VALUES (:owner_balance,:owner)");
        $query->bindParam(':owner_balance',$this->owner_balance);
        $query->bindParam(':owner',$this->owner);
        $query->execute();
        return;
    }

    public function getCart()
    {
        $cart = $this->db->query("SELECT * FROM carts WHERE users_id = $this->owner AND status = 'active'")->fetch();
        return $cart;
    }

    public function getCartProds()
    {
        $cartpr = $this->db->query("SELECT products.id as id, products.name as name, products.price as price, cart_products.quantity as quantity
        FROM cart_products INNER JOIN products on products.id = cart_products.products_id INNER JOIN carts on carts.id = cart_products.carts_id
        WHERE carts.users_id = $this->owner AND carts.status = 'active'")->fetchAll();
        return $cartpr;
    }

    /**
     * Set the value of owner
     *
     * @return  self
     */ 
    public function setOwner($owner)
    {
        $this->owner = $this->helper->Filter($owner);

        return $this;
    }

    /**
     * Set the value of owner_balance
     *
     * @return  self
     */ 
    public function setOwner_balance($owner_balance)
    {
        $this->owner_balance = $this->helper->Filter($owner_balance);

        return $this;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $this->helper->Filter($total);

        return $this;
    }
}