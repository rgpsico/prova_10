<?php

namespace App\Repository;

use App\Repository\Contracts\UserRepositoryInterface;
use App\Service\AutenticateService;


class UserRepository  extends BaseRepository implements UserRepositoryInterface
{

  protected $table;
  protected $auth;

  public function __construct()
  {
    $con = new BaseRepository;
    $this->table  = $con;

    $auth = new AutenticateService;
    $this->auth  = $auth;
  }


  public function getAllUser()
  {
    return $this->table->selectDB("SELECT * FROM pessoa");
  }


  public function getField($tabela, $field, $id)
  {
    return $this->table->selectDB("SELECT * FROM {$tabela} where $field = {$id}");
  }

  public function createUser($tabela, $data)
  {
    return  $this->ExeCreate($tabela, $data);
  }

  public function insertUF($uf)
  {
    $sql = "INSERT INTO `estado` (`uf`) VALUES ('$uf') ";
    return  $this->insertDB($sql);
  }

  public function insertTel($data)
  {
    $pessoa_id = $data[0];
    $telefone = $data[1];

    $sql = "INSERT INTO `telefone` (`pessoa_id`, `telefone`) VALUES ('$pessoa_id', '$telefone') ";

    return  $this->insertDB($sql);
  }

  public function insertAddress($tabela, $data)
  {
    return   $this->ExeCreate($tabela, $data);
  }

  public function login($nome,  $senha)
  {
    $sql =  "SELECT * FROM  pessoa WHERE nome = '{$nome}' AND cpf = '{$senha}'";

    if ($this->table->selectDB($sql)) {
      $this->auth->logar($nome, $senha);
      return true;
    }
  }

  public function deleteAll($tabela, $field, $id)
  {
    $stmt =  $this->connect()->prepare("DELETE FROM {$tabela} WHERE {$field} = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }


  public function deleteUser($id)
  {
    $this->deleteDB("DELETE pessoa, endereco , telefone, estado
      FROM pessoa
      INNER JOIN endereco on endereco.id = pessoa.endereco_id
      INNER JOIN telefone on telefone.pessoa_id = pessoa.id
      INNER JOIN estado on estado.id = endereco.estado_id
      WHERE pessoa.id = $id");
  }
}
