<?php
class QueryHelper 
{
    public function Filter($str) 
    {
        $chars = array("update", "delete", "insert", "truncate", "select", "alter", "script");
        $charsReplace = array("up-da-te", "de-le-te", "in-ser-t", "trun-ca-te", "se-lec-t", "al-ter", "");
        return(str_replace($chars, $charsReplace, $str));
    }

    public function PHash($str)
    {
        $str = sha1(md5($str));
        return $str;
    }

    // 
    public function CheckText($str) 
    {
        return preg_match("/^[\p{L}\s]+$/iu", $str );
    }
    // 
    public function CheckTextAndNumber($str) 
    {
        return preg_match("/^[0-9\p{L}\s]+$/iu", $str );
    }

    // 
    public function CheckInt($str) 
    {
        return preg_match("/^[0-9]+$/", $str );
    }

    public function ValidateEmail($a, $b)
    {
        $error = '';
        $a = $this->Filter($a);
        $email_check = preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $a);
        if(strlen($a) > 45)
        { 
            $error = 'Email field must contain 45 or less characters'; 
            $this->ARClass("error",$b);
        }
        elseif($email_check !== 1)
        {
            $error = "Please insert a valid email";
            $this->ARClass("error",$b);
        }
        else
        {
            $this->ARClass("success",$b);		
        }
        return $error;
    }

    public function ValidatePassword($a, $b)
    {
        $error = '';
        $a = $this->filter($a);
        if(strlen($a) < 6 || strlen($a) > 20)
        { 
            $error = 'Password length must be between 6 to 20 characters'; 
            $this->ARClass("error",$b);
        }
        else
        {
            $this->ARClass("success",$b);		
        }
        return $error;
    }

    public function ValidateTextField($a, $b, $c)
    {
        $error = '';
        if(strlen($a) < 2 || strlen($a) > 45)
        { 
            $error = '"'.$b.'" length must be between 2 to 45 characters'; 
            $this->ARClass("error",$c);
        }
        elseif(!$this->CheckText($a))
        {
            $error = '"'.$b.'" field can only contain letters'; 
            $this->ARClass("error",$c);
        }
        else
        {
            $this->ARClass("success",$c);		
        }
        return $error;
    }

    public function ARClass($a, $b)
    {
        if($a=="error")
        {
            echo'
                <script id="script">
                    $("'.$b.'").addClass("input-error");
                    $("#script").remove();
                </script>
            ';				
        }
        elseif($a=="success")
        {
            echo'
                <script id="script">
                    $("'.$b.'").removeClass("input-error");
                    $("#script").remove();
                </script>
            ';				
        }
        return;
    }

    public function Alert($a, $b)
    {
        if($a=="error")
        {
            echo '
                <div class="alert alert-danger mt-2">
                    '. $b .'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
        elseif($a=="warning")
        {
            echo '
                <div class="alert alert-warning mt-2">
                    '. $b .'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>			
                </div>';
        }
        elseif($a=="success")
        {
            echo '
                <div class="alert alert-success mt-2">
                    '. $b .'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>			
                </div>';
        }
        return;
    }

    
}
