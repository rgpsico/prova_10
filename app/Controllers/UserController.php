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


  public function atualizar()
  {
    $id = $_REQUEST['id'];
    view('cadastrar');
  }

  public function show()
  {
    $id = $_REQUEST['id'];
    return $res = $this->repository->show($id);
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
    // 2022-02-09
    //2022-02-09 00:52:27
    $pessoa = [
      'endereco_id' => $endereco_id,
      'nome' => @$data['nome'],
      'cpf' => @$data['cpf'],
      'rg' => @$data['rg'],
      'data_nascimento' =>  $data['data_nascimento'],
      'data_cadastro' => date('Y-m-d H:i:s')

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
    $data['data_nascimento'] = date('Y-m-d');
    $data['data_cadastro'] = date('Y-m-d H:i:s');
    $data['data_atualizacao'] = 'NULL';
    $data['data_exclusao'] = 'NULL';
    $estado_id = $this->createUf($data);
    $endereco_id = $this->createAdress($data, $estado_id);
    $pessoa_id = $this->createUser($data, $endereco_id);
    $this->createTelefone($data, $pessoa_id);

    header('location:listar');
  }


  public function getTelefone($id_pessoa)
  {
    return $this->repository->getField('telefone', 'pessoa_id', $id_pessoa);
  }

  public function deletar($id)
  {
    $id_pessoa = $_REQUEST['id'];
    $this->repository->deleteUser($id_pessoa);
  }

  public function updateUser($data)
  {
    $data = $_REQUEST;

    @$id = $data['id'];
    $this->repository->updateUser($data, $id);
  }
}
