<?php 

namespace App\Controllers;

use App\Repository\UserRepository;

class HomeController
{
    protected $repository;

    public function __construct()
    {
        $userRepository = new UserRepository;
        $this->repository = $userRepository;        
    }
  

    public function cadastrar()
    {       
       view('cadastrar');
    }

    public function listar()
    {
        $res = $this->repository->getAllUser();                    
        view('listar', $res);
    }
    
   

}