<?php

use App\Middleware\Authenticate;
use Core\Router;

$router = new Router();


$auth = new Authenticate;

if($auth->Auth()){
$router->Get('cadastrar', 'HomeController', 'cadastrar');
$router->post('cadastrar', 'UserController', 'store');
$router->Get('listar', 'HomeController', 'listar');
}


$router->post('delete', 'UserController', 'deletar');



$router->Get('logar', 'LoginController', 'loginPage');
$router->post('logar', 'LoginController', 'logar');
$router->get('logout', 'LoginController', 'logout');


