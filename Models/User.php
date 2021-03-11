<?php
class User extends Model
{
    private $name;
    private $email;
    private $password;
    private $balance;
    
    public function __construct()
    {
        parent::__construct();
        $this->setTable('users');
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of balance
     */ 
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set the value of balance
     *
     * @return  self
     */ 
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    public function save()
    {
        $query = $this->$db->prepare("INSERT INTO users (name,email,password,balance) VALUES (:name,:email,:password,:balance)");
        $query->bindParam(':name',$this->name);
        $query->bindParam(':email',$this->name);
        $query->bindParam(':password',$this->name);
        $query->bindParam(':balance',$this->name);
        $query->execute();
        return;
    }

    




}