<?php
require_once 'models/user.php';

class UserController extends Controller
{
    public function Index()
    {
        
    }

    public function Login()
    {
        
        $this->render('login');
    }
}