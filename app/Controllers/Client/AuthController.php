<?php 
class AuthController extends Controller{
    public function login(){
        $this->view('client/auth/login');
    }

     public function register(){
        $this->view('client/auth/register');
    }
}

?>