<?php
class Rating extends Model
{
    private $rate;
    private $product;
    private $user;
    
    function __construct()
    {
        parent::__construct();
        $this->setTable('ratings');
    }

    public function getRating()
    {
        $avg_rating = 0;
        $ratings = $this->getBy('products_id',$this->product);
        foreach ($ratings as $rating) 
        {
            $avg_rating += $rating['rate'];
        }
        if ($avg_rating > 0) 
        {
            $avg_rating /= sizeof($ratings);
            echo $avg_rating;
        }
        else
        {
            echo 0;
        }
        return;
    }

    public function rate()
    {
        if ($this->isRtated()) 
        {
            $this->helper->Alert('error','Product already rated');
        }
        else
        {
            $this->db->query("INSERT INTO ratings (rate,users_id,products_id) VALUES ({$this->rate},{$this->user},{$this->product})");
            $this->helper->Alert('success','Successfully rated');
        }
        
    }

    public function isRtated()
    {
        $rating = $this->db->query("SELECT COUNT(*) FROM ratings WHERE users_id = $this->user AND products_id = $this->product")->fetchColumn();
        if($rating > 0)
        {
            return True;
        }
        return False;
    }

    /**
     * Set the value of product
     *
     * @return  self
     */ 
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }
}