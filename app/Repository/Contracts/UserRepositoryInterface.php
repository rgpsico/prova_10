<?php

namespace App\Repository\Contracts;

interface UserRepositoryInterface
{
    public function getField($tabela, $field, $id);
    public function getAllUser();
    public function deleteAll($tabela, $field, $id);
    public function createUser($tabela, $data);
    public function show($id);
}
