<?php 
class Controller
{
    public function render($view,Array $data = null)
    {
        foreach ($data as $key => $value) 
        {
            ${$key} = $value;
        }

        ob_start();
        require_once "Views/{$view}.php";
        $content = ob_get_contents();
        ob_end_clean();

        require_once "Views/Layout/BaseLayout.php";
    }



}