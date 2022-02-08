<?php


use App\Controllers\UserController;
use config\database;

require_once '../vendor/autoload.php';


$con = new database;
$user = new UserController($con);

$res = $user->getAllUser();



switch (@$_GET['page']) {
    case 'login':
        require_once('../app/Views/includes/header.php');
        require_once('../app/Views/login.php');
        require_once('../app/Views/includes/footer.php');
    break;

    case 'cadastrar':
        require_once('../app/Views/includes/header.php');
        require_once('../app/Views/cadastrar.php');
        require_once('../app/Views/includes/footer.php');
    break;

    case 'listar':
        require_once('../app/Views/includes/header.php');
        require_once('../app/Views/listar.php');
        require_once('../app/Views/includes/footer.php');
    break;
    
    default:
        # code...
        break;
}