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

  public function show($id)
  {

    return $this->table->selectDB("SELECT * 
    FROM pessoa
    INNER JOIN endereco on endereco.id = pessoa.endereco_id
    INNER JOIN telefone on telefone.pessoa_id = pessoa.id
    INNER JOIN estado on estado.id = endereco.estado_id
    WHERE pessoa.id = {$id}");
  }


  public function getAllUser()
  {
    return $this->table->selectDB("SELECT *, pessoa.id as id
    FROM pessoa
    INNER JOIN endereco on endereco.id = pessoa.endereco_id
    INNER JOIN telefone on telefone.pessoa_id = pessoa.id
    INNER JOIN estado on estado.id = endereco.estado_id
    WHERE data_exclusao is NULL order by pessoa.id desc");
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

  public function delLogic($id)
  {
    $res = $this->updateDB("
        update pessoa 
        JOIN endereco   ON  endereco.id = pessoa.endereco_id 
        JOIN telefone ON pessoa.id = telefone.pessoa_id
        JOIN estado  ON estado.id = endereco.estado_id
        set    
        pessoa.data_exclusao = now()      
        WHERE  pessoa.id = $id");
  }

  public function updateUser($data, $id)
  {

    $nome =  $data['nome'];
    $cpf = $data['cpf'];
    $rg = $data['rg'];
    $cep = $data['cep'];
    $endereco  = $data['endereco'];
    $numero  = $data['numero'];
    $telefone = $data['telefone'];
    @$uf = $data['UF'];


    $res = $this->updateDB("
    update pessoa 
    JOIN endereco   ON  endereco.id = pessoa.endereco_id 
    JOIN telefone ON pessoa.id = telefone.pessoa_id
    JOIN estado  ON estado.id = endereco.estado_id
    set 
    pessoa.nome = '$nome',
    pessoa.cpf = '$cpf',
    pessoa.rg = '$rg',
    pessoa.data_atualizacao = NOW(),
    
    endereco.cep = '$cep',
    endereco.endereco = '$endereco',
    endereco.numero = '$numero',
    
    telefone.telefone = '$telefone',
    estado.uf = '$uf'
    WHERE  pessoa.id = $id");
    header('location:listar');
  }
}
