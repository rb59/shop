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

    public function create()
    {
        $this->render('register');
    }

    public function store()
    {
        $user = new User();
        $user->setName($this->getPost('name'));
        $user->setEmail($this->getPost('email'));
        $user->setPassword($this->getPost('password'));
        $user->Register();
    }

    public function Logout()
    {
        session_destroy();
        header("LOCATION: ". PATH ."/");
		exit;
    }
}