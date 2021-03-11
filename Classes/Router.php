<?php

class Router
{
    private $routing = [];

    public final function addRouting($pattern, $action) 
    {
        $this->routing[$pattern] = $action;
    }

    public final function route($method, $path, $params) 
    {

        $path = "{$method} " . $this->withEscapedSlashes("/{$path}");
        foreach ($this->routing as $pattern => $handler) 
        {
            $patternParams = $this->patternParams($pattern);
            if (!empty($patternParams)) 
            {
                $pattern = $this->withParams($pattern);
            }
            $pattern = $this->withEscapedSlashes($pattern);
            $pattern = $this->withMethod($pattern);
            
            $value =$this->requestMatches($pattern, $path, $patternParams, $params);
            if ($this->requestMatches($pattern, $path, $patternParams, $params)) 
            {
                
                $handler($params);
                return;
            }
        }

        http_response_code(404);
        
    }

    private function requestMatches($pattern, $path, $patternParams = [], &$params) 
    {
       unset($params['url']);
        if (preg_match("/^{$pattern}$/i", $path, $matches)) 
        {
            
            if (!empty($patternParams)) 
            {
                for ($i = 0; $i < sizeof($patternParams); $i++) 
                {
                    $params[$patternParams[$i]] = $matches[$i + 1];
                }
            }
            
            return true;
        }
        return false;
    }

    private function patternParams($pattern) 
    {
        $matches = [];
        if (preg_match_all('/{(\w+)}/', $pattern, $matches)) 
        {
            return $matches[1];
        }
    }

    private function withEscapedSlashes($pattern) 
    {
        return str_replace('/', ':', $pattern);
    }

    private function withMethod($pattern) 
    {
        return !preg_match("/^[A-Z]+ .+$/i", $pattern) ? "{$_SERVER['REQUEST_METHOD']} {$pattern}" : $pattern;
    }

    private function withParams($pattern) 
    {
        return preg_replace('/{\w+}/', '([^:]+)', $pattern);
    }

}