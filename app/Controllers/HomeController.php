<?php

namespace App\Controllers;

use App\Repository\UserRepository;
use App\Utils\View;

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

    public  function listar()
    {
        $res = $this->repository->getAllUser();
        view('listar', $res);
    }
    /**
     * 
     */

    public static function getHome()
    {
        return "oal mundo";
    }
}
