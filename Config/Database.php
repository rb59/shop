<?php

use Config\Config;
class Database
{

    private $conf;

    public function __construct()
    {
        $this->conf = new Config();
        $this->definevars();
    
    }


    private function definevars()
    {
        foreach($this->conf->database() as $var => $value)
        {
            if(!defined($var))
            {
                define($var,$value);
            }
        }
    }

    public function connect()
    {
        $strconn ="{driver}:host={host};port={port};dbname={database};charset={charset}";
        $pdo = new PDO($strconn,user,password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
}