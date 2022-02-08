<?php 

namespace Client\Response;

class Response{

    private $data;
    private $url;

 
    public function get($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        return $this->data =  json_decode(curl_exec($curl));

    }

}