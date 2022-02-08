<?php 

namespace config;

use PDO;
use PDOException;

class database{

    protected $Create;
    protected $Result;
    protected static $dbtype   = "mysql";
    protected static $host     = "localhost";
    protected static $port     = "3307";
    protected static $user     = "root";
    protected static $password = "123456";
    protected static $db       = "prova";
         
        /*Metodos que trazem o conteudo da variavel desejada
        @return   $xxx = conteudo da variavel solicitada*/
        protected function getDBType()  {return self::$dbtype;}
        protected function getHost()    {return self::$host;}
        protected function getPort()    {return self::$port;}
        protected function getUser()    {return self::$user;}
        protected function getPassword(){return self::$password;}
        protected function getDB()      {return self::$db;}

        protected function connect(){
        try
            {
             $this->conexao = new PDO($this->getDBType().":host=".$this->getHost().";port=".$this->getPort().";dbname=".$this->getDB(), $this->getUser(), $this->getPassword());
            }
        catch (PDOException $i)
            {
                //se houver exceção, exibe
                die("Erro: <code>" . $i->getMessage() . "</code>");
            }
             
            return ($this->conexao);
        }
         
        protected function disconnect(){
            $this->conexao = null;
        }
    
}


