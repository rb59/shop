<?php
require_once 'Models/User.php';

class UserController extends Controller
{
       

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

    
}