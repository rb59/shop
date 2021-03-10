<?php

namespace Config;
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
}