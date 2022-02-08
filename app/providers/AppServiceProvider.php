<?php

namespace App\Providers;

use App\Controllers\UserController;
use App\Models\Conexao;

class AppServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $con =  new Conexao();
        $user = new UserController($con);
    }

}



?>