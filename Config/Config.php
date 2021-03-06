<?php


class Config
{
    // Returns the values needed to create the db connection
    final function database()
    {
        return 
        [
            'driver'   => 'mysql',
            'host'     => '127.0.0.1',
            'port'     => '3306',
            'user'     => 'root',
            'password' => '',
            'database' => 'shop',
            'charset'  => 'utf8mb4',
        ];
    }

    final function constants()
    {
        return
        [
            'NAME'  => 'Shop',
            'PATH'	=> 'http://'.$_SERVER['SERVER_NAME'].'/shop',
            'PATHI'	=> 'http://'.$_SERVER['SERVER_NAME'].'/shop/resources',
        ];
    }

    final function defineconf()
    {
        foreach ($this->constants() as $var => $value) 
        {
            if (!defined($var)) {
                define($var,$value);
            }
        }
        return;
    }
}