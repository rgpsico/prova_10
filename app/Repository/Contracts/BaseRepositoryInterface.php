<?php

namespace App\Repository\Contracts;

interface BaseRepositoryInterface{
    public function selectDB($sql, $params = null, $class = null );
     

    public function insertDB($sql, $params = null);

  

    public function getSyntax();

    public function ExeCreate($Tabela, array $Dados);
     
  
    public function updateDB($sql,$params=null);
     
  
    public function deleteDB($sql,$params=null);




}
?>
