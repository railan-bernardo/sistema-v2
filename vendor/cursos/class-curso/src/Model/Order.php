<?php

 namespace Curso\Model;

 use \Curso\DB\Sql;
 use \Curso\Model;

 class Order extends Model{

    public static function listAll(){

        $sql = new Sql();

       return $sql->select("SELECT * FROM tb_control ORDER BY dtregister");

    }

    public function save(){

        $sql = new Sql();

       $results = $sql->select("CALL sp_order_save(:idcontrol, :desname, :desstate, :descity, :nrphone, :desshift, :desconsultant,
         :desteacher, :deshelp, :desprice, :desdate)", [
             ":idcontrol"=>$this->getidcontrol(),
             ":desname"=>$this->getdesname(),
             ":desstate"=>$this->getdesstate(),
             ":descity"=>$this->getdescity(),
             ":nrphone"=>$this->getnrphone(),
             ":desshift"=>$this->getdesshift(),
             ":desconsultant"=>$this->getdesconsultant(),
             ":desteacher"=>$this->getdesteacher(),
             ":deshelp"=>$this->getdeshelp(),
             ":desprice"=>$this->getdesprice(),
             ":desdate"=>$this->getdesdate()
         ]);

         $this->setData($results[0]);

    }

    
    public function get($idcontrol){
     
        $sql = new Sql();
    
        $results = $sql->select("SELECT * FROM tb_control  WHERE idcontrol = :idcontrol", array(
            ":idcontrol"=>$idcontrol
        ));
    
        $this->setData($results[0]);
     }

     public function delete(){

        $sql = new Sql();

        $sql->select("CALL sp_order_delete(:idcontrol)",[
            ":idcontrol"=>$this->getidcontrol()
        ]);

     }

     //paginação
     public static function getPage($page = 1, $itemsPerPage = 10)
     {
 
         $start = ($page - 1) * $itemsPerPage;
 
         $sql = new Sql();
 
         $results = $sql->select("
             SELECT SQL_CALC_FOUND_ROWS *
             FROM tb_control 
             ORDER BY dtregister
             LIMIT $start, $itemsPerPage;
         ");
 
         $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");
 
         return [
             'data'=>$results,
             'total'=>(int)$resultTotal[0]["nrtotal"],
             'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
         ];
 
     }

     //search com paginação
     public static function getPageSearch($search, $page = 1, $itemsPerPage = 10){

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

       $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS  * FROM tb_control WHERE desname LIKE :desname
       OR descity LIKE :descity OR desshift LIKE :desshift OR MONTH(dtregister) LIKE :dt OR desteacher LIKE :desteacher OR desconsultant LIKE :desconsultant ORDER BY desname LIMIT $start, $itemsPerPage",[
            ":desname"=>'%'. $search .'%',
            ":descity"=>'%'. $search .'%',
            ":desshift"=>'%'. $search .'%',
            ":dt"=>'%'. $search .'%',
            ":desteacher"=>'%'. $search .'%',
            ":desconsultant"=>'%'. $search .'%'
        ]);

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

     }

public static function getL($s){

    $sql = new Sql();

   return $sql->select("SELECT COUNT(MONTH(dtregister))  AS mes from tb_control WHERE desconsultant = :s AND MONTH(dtregister) LIKE MONTH(CURRENT_DATE())",[
       ":s"=>$s
   ]);

}

public static function getp($s){

    $sql = new Sql();

   return $sql->select("SELECT COUNT(MONTH(dtregister))  AS mes from tb_control WHERE desteacher = :s AND MONTH(dtregister) LIKE MONTH(CURRENT_DATE())",[
       ":s"=>$s
   ]);

}

 }

?>