<?php 

namespace App\Service;

class AutenticateService{

 

    public function logar($nome, $senha)
    {            
        if (isset($_SESSION)) {        
            $_SESSION['login'] = $nome;
            $_SESSION['senha'] = $senha;
            header("Location:listar");
        } 

    }

    public function isLoggin()
    {
        if (isset($_SESSION['login'])) {
            return true;
        }

    }

  

 
    
  

}