<?php

namespace Curso\Model;

use \Curso\DB\Sql;

class Stating {

    public static function statingUser(){

        $sql = new Sql();

       return $sql->select("SELECT  COUNT(*) AS users FROM tb_users");

    }

    public static function statingStudant(){

        $sql = new Sql();

       return $sql->select("SELECT  COUNT(*) AS studant FROM tb_aluno");

    }

    public static function statingConsultantd($id){

        $sql = new Sql();

       return $sql->select("SELECT COUNT(MONTH(dtregister))  AS consultantd from tb_aluno WHERE idperson = '$id' AND MONTH(dtregister) LIKE MONTH(CURRENT_DATE())");

    }

    public static function getStage($stage){

        $sql = new Sql();

        return $sql->select("SELECT COUNT(*) AS stages FROM tb_aluno  WHERE desstage = '$stage'");
    }

    public static function getMonth(){

        $sql = new Sql();
    
       return $sql->select("SELECT * FROM tb_aluno WHERE dtregister");
    
    }
}

?>