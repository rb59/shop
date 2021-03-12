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
        $this->name = $this->helper->Filter($name);

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
        $this->email = $this->helper->Filter($email);

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

    public function Login()
    {
        
        if(empty($this->email)  || empty($this->password))
        {
            $this->helper->Alert("error", "Please complete all fields");
        }
        elseif(!$this->userExist())
        {
            $this->helper->Alert("warning", "Email not registered");
        }
        elseif($this->userCredentals() )
        {
            $this->sessionInit();
            echo "
                <script type=\"text/javascript\">
                    location.href = '". PATH ."/';
                </script>
            ";
            exit;
        }
        else
        {
            $this->helper->Alert("error", "Incorrect email or password");
            $this->helper->ARClass("error","#email");
            $this->helper->ARClass("error","#password");
        }
        
    }

    public function Register() 
    {       
        
        if(empty($this->name) ||  empty($this->email) || empty($this->password) )
        {
            $this->helper->Alert("error", "Please complete all fields");
        }
        else
        {
            $ValidateName = $this->helper->ValidateTextField($this->name,"Name","#name");
            $ValidateEmail = $this->helper->ValidateEmail($this->email, "#email");
            $ValidatePassword = $this->helper->ValidatePassword($this->password, "#password");
            if (empty($ValidateEmail) && $this->userExist()) {
                $ValidateEmail = "Email already registered";
                $this->helper->ARClass("error","#email");
            }
            
            if(empty($ValidateName) && empty($ValidateEmail) && empty($ValidatePassword) )
            {	
                $this->password = $this->helper->PHash($this->password);
                $this->save();
                $this->sessionInit();
               
                echo "
                    <script type=\"text/javascript\">
                        location.href = '". PATH ."/';
                    </script>
                ";
                return true;
            }
            else
            {
                $error = '';
                if(!empty($ValidateName)){ $error .= "<li>". $ValidateName."</li>";}
                if(!empty($ValidateEmail)){ $error .= "<li>". $ValidateEmail ."</li>"; }
                if(!empty($ValidatePassword)){ $error .= "<li>". $ValidatePassword ."</li>"; }
                $this->helper->Alert("error", $error);
            }
        }
    
        return false;
        
    }

    public function sessionInit()
    {
        $users = $this->getBy('email',$this->email);
        foreach ($users as $user) 
        {
            foreach ($user as $key => $value) 
            {
                $_SESSION[$key] = $value;
            }            
        }
    }
    
    public function userExist()
    {
        $num_users = $this->db->query("SELECT COUNT(*) FROM users WHERE email = '{$this->email}'")->fetchColumn();
        if ($num_users > 0) 
        {
            return True;
        }
        return False;
    }

    public function userCredentals()
    {
        $user = $this->db->query("SELECT COUNT(*) FROM users WHERE email = '{$this->email}' AND password = '{$this->helper->PHash($this->password)}'")->fetchColumn();
        if ($user > 0) 
        {
            return True;
        }
        return False;
    }


}