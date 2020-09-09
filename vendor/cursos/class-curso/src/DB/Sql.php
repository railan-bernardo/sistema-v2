<?php

namespace Curso\DB;

class Sql {


    const HOSTNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "Ne_yo385x";
    const DBNAME   = "cacursos_dbpage";

    private $conn;

    //conexao com o banco usando PDO
    public function __construct(){
        $this->conn = new \PDO("mysql:host=".Sql::HOSTNAME.";dbname=".Sql::DBNAME, 
        Sql::USERNAME, Sql::PASSWORD
    );
    }

    public function setParams($statement, $parametes  = array()){

        foreach($parametes as $key => $value){

            $this->setParam($statement, $key, $value);

        }

    }

    public function setParam($statement, $key, $value){

        $statement->bindParam($key, $value);

    }

    // query executa alguma coia no  banco
    public function query($rawQuery, $params = array()){

        $stmt = $this->conn->prepare($rawQuery, $params);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;

    }

    //consulta e retorna alguma coisa
    public function select($rawQuery, $params = array()){

        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}

?>