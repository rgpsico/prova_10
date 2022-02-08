<?php

namespace App\Middleware;

use App\Service\AutenticateService;

class Authenticate 
{   
    private $AutenticateService;

      public function __construct()
      {
          $this->AutenticateService = new AutenticateService;
                   
      }


      public function Auth()
      {
        if ($this->AutenticateService->isLoggin()) {      
              return true;
          }

      }
   
   
    
}
