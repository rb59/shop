<?php
class LoginController extends UserController
{

    public function Index()
    {
          
        $this->render('login');
    }

    public function Login()
    {
        $user = new User();
        $user->setEmail($this->getPost('email'));
        $user->setPassword($this->getPost('password'));
        $user->Login();
    }

    public function Logout()
    {
        session_destroy();
        header("LOCATION: ". PATH ."/");
		exit;
    }

}