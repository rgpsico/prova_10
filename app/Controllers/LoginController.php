<?php 

namespace App\Controllers;


use App\Repository\UserRepository;

class LoginController
{
    private $repository;
    public function __construct()
    {
        $repository = new UserRepository;
        $this->repository = $repository;
                                   
    }

    public function loginPage()
    {
        view('login');
    }


    public function logar()
    {       
     $nome  = @$_REQUEST['nome'];
     $senha = @$_REQUEST['senha'];  
     if($res = $this->repository->login($nome, $senha));
     }

     public function logout()
     {      
        if(isset($_SESSION)) 
        { 
            session_destroy(); 
            view('login');
        } 

     }

 
}