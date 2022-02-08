<?php 

namespace App\Controllers;

use App\Service\AddressService;

class AddressController
{
    protected $address;

    public function __construct()
    {
        $this->address =  new AddressService;
        
    }

    public function getUf()
    {
       return json_encode($this->address->getUf());
      
    }

    public function getCep($cep)
    {
       return json_encode($this->address->getAddressByCep($cep));
      
    }


}