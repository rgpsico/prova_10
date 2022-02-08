<?php

namespace App\Controllers;


use App\Repository\UserRepository;

class UserController
{
  protected $repository;

  public function __construct()
  {
    $userRepository = new UserRepository;
    $this->repository = $userRepository;
  }


  public function getPessoa($id)
  {
    return $this->repository->getField('pessoa', 'id', $id);
  }


  public function getAllUser()
  {
    return $this->repository->getAllUser();
  }

  public function createUf($data)
  {
    return  $estado_id = $this->repository->insertUF(@$data['UF']);
  }

  public function createAdress($data, $estado_id)
  {
    $endereco = ['estado_id' => $estado_id, 'cep' => @$data['CEP'], 'endereco' => @$data['endereco'], 'numero' => @$data['numero']];
    return $endereco_id = $this->repository->insertAddress('endereco', $endereco);
  }


  public function createUser($data, $endereco_id)
  {
    $pessoa = [
      'endereco_id' => $endereco_id,
      'nome' => @$data['nome'],
      'cpf' => @$data['cpf'],
      'rg' => @$data['rg'],
      'data_nascimento' => @$data['data_nascimento'],
      'data_cadastro' => date('m-d-Y'),
      'data_atualizacao' => '',
      'data_exclusao' => ''
    ];

    return $pessoa_id =  $this->repository->createUser('pessoa', $pessoa);
  }

  public function createTelefone($data, $pessoa_id)
  {
    $telefone = ['pessoa_id' => $pessoa_id, 'telefone' => @$data['telefone']];

    return $this->repository->ExeCreate('telefone', $telefone);
  }

  public function store()
  {

    $data = $_REQUEST;

    $estado_id = $this->createUf($data);
    $endereco_id = $this->createAdress($data, $estado_id);
    $pessoa_id = $this->createUser($data, $endereco_id);
    $this->createTelefone($data, $pessoa_id);
  }


  /**
   * 

     getPessoa
     getTelefone
     getEstado
     getEndereco
   


   */

  public function getTelefone($id_pessoa)
  {
    return $this->repository->getField('telefone', 'pessoa_id', $id_pessoa);
  }

  public function getEndereco($endereco_id)
  {
    return $this->repository->getField('endereco', 'id', $endereco_id);
  }

  public function getEstado($estado_id)
  {
    return $this->repository->getField('estado', 'id', $estado_id);
  }

  public function deletar($id)
  {
    $id_pessoa = $_REQUEST['id'];
    $this->repository->deleteUser($id_pessoa);
  }
}
