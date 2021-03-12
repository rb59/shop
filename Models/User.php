<?php
class User extends Model
{
    private $name;
    private $email;
    private $password;
    private $balance = 100;
    
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
        $query = $this->db->prepare("INSERT INTO users (name,email,password,balance) VALUES (:name,:email,:password,:balance)");
        $query->bindParam(':name',$this->name);
        $query->bindParam(':email',$this->email);
        $query->bindParam(':password',$this->password);
        $query->bindParam(':balance',$this->balance);
        $query->execute();
        return;
    }

    public function Register() 
    {       
        if(empty($this->name) ||  empty($this->email) || empty($this->password) )
        {
            $this->helper->Alert("error", "Please complete all fields");
        }
        else{
            $ValidateName = $this->helper->ValidateTextField($this->name,"Name","#name");
            $ValidateEmail = $this->helper->ValidateEmail($this->email, "#email");
            $ValidatePassword = $this->helper->ValidatePassword($this->password, "#password");
            
            if(empty($ValidateName) && empty($ValidateEmail) && empty($ValidatePassword) )
            {	
                
                $npassword = $this->helper->PHash($this->password);
                $this->save();
                //ENVIAMOS LAS PREGUNTAS A LA FUNCION DE AGREGAR PREGUNTAS
                $user = $this->getBy('email',$this->email);
                $userid = $user['id'];
                
                $_SESSION['id'] = $userid;
                $_SESSION['email'] = $this->email;
                $_SESSION['password'] = $npassword;
                $_SESSION['balance']  = $this->balance;
               
                echo "
                    <script type=\"text/javascript\">
                        location.href = '". PATH ."/';
                    </script>
                ";
                return true;
            }
            else{
                if(!empty($ValidateName)){ $error1 = "<li>". $ValidateName."</li>";}

                if(!empty($ValidateEmail)){ $error2 = "<li>". $ValidateEmail ."</li>"; }
                if(!empty($ValidatePassword)){ $error3 = "<li>". $ValidatePassword ."</li>"; }

                $error = $error1 . $error2 . $error3 ;
                $this->helper->Alert("error", $error);
            }
        }
    
        return false;
        
    }

    




}