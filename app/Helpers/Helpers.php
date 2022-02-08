<?php 

if (! function_exists('view')) {
function dd(array $array){
        echo "<pre>";
        var_dump($array);
        echo "</pre>";
    }
}

if (! function_exists('view')) {      
    function view($view = null, $data = [])
    {       
        $res = $data ;    
        include_once('app/Views/' . $view . ".php");
             
    }
}


if (! function_exists('auth')) {     
    function isAuthenticate()
    {
        @session_start();

        if(!empty($_SESSION['login'])){
            return true;
    }     
    }
}

   
