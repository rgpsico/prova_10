<?php 

namespace App\Service;

use Client\Response\Response;

class AddressService{

    private $response;
    
    public function __construct()
    {
        $this->response = new Response();        
    }

    public function getAddressByCep($cep)
    {
        echo json_encode($this->response->get(URI_VIA_CEP . "/" . $cep. "/" . "json"));  
        exit;           
    }

    public function getUf()
    {
        echo json_encode($this->response->get(URI_IBGE_UF));  
        exit;  
    }


}