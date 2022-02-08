<?php 

namespace Core; 

class Router
{
    private $router;
    private $controller;
    private $method;
    private $params = [];



    public function __construct()
    {     
       
    }
    public function hasRoute($page)
    {
        if (isset($_REQUEST['router']) && $_REQUEST['router'] == $page) {
            return true;
      }
    }

    public function Http($page = null, $controller, $method, $params = null)
    {   
             
       if($this->hasRoute($page))
       {          
            $this->controller = $controller;
            $this->method = $method;
            $this->params = $params;
            $this->router = $this->url();
            
            $object = $this->getClassController($this->controller);

            $this->method  = $this->getMethodController($object);
            
            $this->params = $this->router ? array_values($this->router) : []; 
            call_user_func_array([$object, $this->method], $this->params);
       }
    
    }

  
    public function getClassController($controller)
    {
        $class = "\\App\\Controllers\\" . ucfirst($controller);
         return  new $class;
    }

    
    public function getMethodController($class)
    {
        if(isset($router[1]) and method_exists($class, $this->router[1])){
            $this->method = $router[1];
            unset($router[1]);
        }
        return  $this->method;

    }
 
    public function url()
    {
        $url = explode("/", filter_input(INPUT_GET, 'router', FILTER_SANITIZE_URL));
        return $url;
    }

    public function post($page = null, $controller, $method)
    {  
             
     return $this->Http($page, $controller , $method);
    
    }

    public function get($page = null, $controller, $method, $params = null)
    { 
        $this->Http($page, $controller, $method, $params);

    }


 
             


}