<?php

namespace Curso\Model;

use \Curso\DB\Sql;
use \Curso\Model;

class Aluno extends Model{

    const SUCCESS = "success";
    const ERROR = "erro";

    public static function ListAll(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_aluno ORDER BY dtregister DESC");

    }


    public function save(){

        $sql = new Sql();


        $results = $sql->select("CALL sp_aluno_save(:idaluno, :idperson, :desaluno, :desemail, :nrphone, :desstate,
         :descity, :descurso, :desturno, :desunity, :desstage, :descontent, :desboubt, :desprice,
          :gdate, :desacount)", array(
            ":idaluno"=>$this->getidaluno(),
            ":idperson"=>$this->getidperson(),
             ":desaluno"=>$this->getdesaluno(),
             ":desemail"=>$this->getdesemail(),
             ":nrphone"=>$this->getnrphone(),
              ":desstate"=>$this->getdesstate(),
              ":descity"=>$this->getdescity(),
              ":descurso"=>$this->getdescurso(),
             ":desturno"=>$this->getdesturno(),
             ":desunity"=>$this->getdesunity(),
             ":desstage"=>$this->getdesstage(),
             ":descontent"=>$this->getdescontent(),
             ":desboubt"=>$this->getdesboubt(),
             ":desprice"=>$this->getdesprice(),
             ":gdate"=>$this->getgdate(),
             ":desacount"=>$this->getdesacount()
         ));

       $this->setData($results[0]);

    }

    public function get($iduser){
     
        $sql = new Sql();
    
        $results = $sql->select("SELECT * FROM tb_aluno  WHERE idaluno = :idaluno", array(
            ":idaluno"=>$iduser
        ));
    
        $this->setData($results[0]);
     }


    public function delete(){
    
        $sql = new Sql();
    
        $sql->query("CALL sp_aluno_delete(:idaluno)", array(
            ":idaluno"=>$this->getidaluno()
        ));
     }

     public static function getPage($page = 1, $itemsPerPage = 10)
     {
 
         $start = ($page - 1) * $itemsPerPage;
 
         $sql = new Sql();
 
         $results = $sql->select("
             SELECT SQL_CALC_FOUND_ROWS *
             FROM tb_aluno 
             ORDER BY dtregister DESC 
             LIMIT $start, $itemsPerPage;
         ");
 
         $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");
 
         return [
             'data'=>$results,
             'total'=>(int)$resultTotal[0]["nrtotal"],
             'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
         ];
 
     }
    
     public static function getPageSearch($search, $page = 1, $itemsPerPage = 10){

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

       $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS  * FROM tb_aluno WHERE desaluno LIKE :desaluno
       OR descity LIKE :descity OR desturno LIKE :desturno OR dtregister LIKE :dt ORDER BY desaluno LIMIT $start, $itemsPerPage",[
            ":desaluno"=>'%'. $search .'%',
            ":descity"=>'%'. $search .'%',
            ":desturno"=>'%'. $search .'%',
            ":dt"=>'%'. $search .'%'
        ]);

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

     }

     public static function setError($msg)
     {
 
         $_SESSION[Aluno::ERROR] = $msg;
 
     }
     
     public static function setSuccess($msg)
     {
 
         $_SESSION[Aluno::SUCCESS] = $msg;
 
     }

     public static function getSuccess()
     {
 
         $msg = (isset($_SESSION[Aluno::SUCCESS]) && $_SESSION[Aluno::SUCCESS]) ? $_SESSION[Aluno::SUCCESS] : '';
 
         Aluno::clearSuccess();
 
         return $msg;
 
     }

     public static function clearSuccess()
     {
 
         $_SESSION[Aluno::SUCCESS] = NULL;
 
     }
 
}

?>