<?php

namespace App\Repository;

use config\database;
use PDO;

class BaseRepository extends database
{

    protected $results;


    /*Método select que retorna um VO ou um array de objetos*/
    public function selectDB($sql, $params = null, $class = null)
    {

        $query = $this->connect()->prepare($sql);
        $query->execute($params);

        if (isset($class)) {
            $this->results = $query->fetchAll(PDO::FETCH_CLASS, $class) or die(print_r($query->errorInfo(), true));
        } else {
            $this->results = $query->fetchAll(PDO::FETCH_OBJ) or die('');
        }

        return $this->results;
    }

    /*Método insert que insere valores no banco de dados e retorna o último id inserido*/
    public function insertDB($sql, $params = null)
    {
        $conexao = $this->connect();
        $query = $conexao->prepare($sql);
        $query->execute($params);
        $results = $conexao->lastInsertId();

        return $results;
    }



    public function getSyntax()
    {
        $Fileds = implode(', ', array_keys($this->Dados));
        $Places = ':' . implode(', :', array_keys($this->Dados));
        return $this->Create = "INSERT INTO {$this->Tabela} ({$Fileds}) VALUES ({$Places})";
    }

    public function ExeCreate($Tabela, array $Dados)
    {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;
        $sql =  $this->getSyntax();

        $insert = $this->connect()->prepare($sql);
        $insert->execute($Dados);
        return  $this->conexao->lastInsertId();
    }

    /*Método update que altera valores do banco de dados e retorna o número de linhas afetadas*/
    public function updateDB($sql, $params = null)
    {
        $query = $this->connect()->prepare($sql);
        $query->execute($params);
        $results = $query->rowCount() or die(print_r($query->errorInfo(), true));

        return $results;
    }

    /*Método delete que excluí valores do banco de dados retorna o número de linhas afetadas*/
    public function deleteDB($sql, $params = null)
    {
        $query = $this->connect()->prepare($sql);
        $query->execute($params);
        $results = $query->rowCount() or die(print_r($query->errorInfo(), true));

        return $results;
    }

    /**
     * Where('id','5');
     */
    public function where($tabela, $field, $value)
    {
        $sql =  "SELECT * FROM {$tabela} WHERE {$field} = '{$value}'";
        return $this->selectDB($sql);
    }

    public function delete($id)
    {
        $stmt =  $this->connect()->prepare('DELETE FROM pessoa WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
