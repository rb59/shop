<?php 
abstract class Controller
{
    public function render($view,Array $data = null)
    {
        if (!empty($data)) 
        {
            foreach ($data as $key => $value) 
            {
                ${$key} = $value;
            }
        }
        

        ob_start();
        require_once "Views/{$view}.php";
        $content = ob_get_contents();
        ob_end_clean();

        require_once "Views/Layouts/baselayout.php";
    }

    public function getPost($param)
    {
        return $_POST[$param];
    }

    public function existPost($param)
    {
        if (isset($_POST[$param])) {
            return True;
        }
        return False;
    }

    

}