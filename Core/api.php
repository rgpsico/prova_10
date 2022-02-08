<?php

use App\Middleware\Authenticate;
use Core\Router;

$router = new Router();


$router->get('uf','AddressController','getUf');


$router->get('cep','AddressController','getCep',$_REQUEST);





