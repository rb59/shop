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

    // CADENAS CON SOLO LETRAS
    public function CheckText($a) 
    {
        return preg_match("/^[\p{L}\s]+$/iu", $a );
    }
    // CADENAS CON LETRAS Y NÚMEROS
    public function CheckTextAndNumber($a) 
    {
        return preg_match("/^[0-9\p{L}\s]+$/iu", $a );
    }

    // CADENAS CON SOLO NÚMEROS
    public function CheckInt($a) 
    {
        return preg_match("/^[0-9]+$/", $a );
    }
    
}
