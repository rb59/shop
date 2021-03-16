<?php
require_once 'Router.php';
class Dispatcher 
{
    private $router;

    function __construct() 
    {
        $this->router = new Router();
    }

    public final function dispatch() 
    {
        $url = isset($_GET['url']) ? $_GET['url']: '';
        $url = rtrim($url, '/');
        $this->router->route(
            $_SERVER['REQUEST_METHOD'],
            $url,
            $_REQUEST);
    }

    public final function routing($pattern, $action) 
    {
        $this->router->addRouting($pattern, $action);
        return $this;
    }

   /* private final function pathFromUri($path) 
    {
        $path = !empty($path) && $path[strlen($path) - 1] == '/' ? substr($path, 0, strlen($path) - 1) : $path;
        if (empty($path)) 
        {
            return '';
        }
        $queryPos = strpos($path, '?');
        if ($queryPos !== FALSE) 
        {
            $path = substr($path, 0, $queryPos);
        }
        return $path[0] === '/' ? substr($path, 1) : $path;
    }*/

}

