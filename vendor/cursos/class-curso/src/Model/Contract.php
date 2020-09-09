<?php

namespace Curso\Model;

use \Curso\DB\Sql;
use \Curso\Model;

class Contract extends Model{

    public static function listAll(){

        $sql = new Sql();

       return $sql->select("SELECT * FROM tb_contract  ORDER BY dtregister");

    }


    public function save(){

        $sql = new Sql();

       $results = $sql->select("CALL sp_contract_save(:idcontract, :desname, :desparent, :desemail, :nrcpf, :nrrg, :desbirthday, :descontractor, :descontractdate, :nrphone,
         :nrcellphone, :descity, :desstate, :neighborhood, :desadress, :deszipcode, :desstart, :desconsultant, :descourse, :desperiod)", [
            ":idcontract"=>$this->getidcontract(),
            ":desname"=>$this->getdesname(),
            ":desparent"=>$this->getdesparent(),
            ":desemail"=>$this->getdesemail(),
            ":nrcpf"=>$this->getnrcpf(),
            ":nrrg"=>$this->getnrrg(),
            ":desbirthday"=>$this->getdesbirthday(),
            ":descontractor"=>$this->getdescontractor(),
            ":descontractdate"=>$this->getdescontractdate(),
            ":nrphone"=>$this->getnrphone(),
            ":nrcellphone"=>$this->getnrcellphone(),
            ":descity"=>$this->getdescity(),
            ":desstate"=>$this->getdesstate(),
            ":neighborhood"=>$this->getneighborhood(),
            ":desadress"=>$this->getdesadress(),
            ":deszipcode"=>$this->getdeszipcode(),
            ":desstart"=>$this->getdesstart(),
            ":desconsultant"=>$this->getdesconsultant(),
            ":descourse"=>$this->getdescourse(),
            ":desperiod"=>$this->getdesperiod()
         ]);

         $this->setData($results[0]);

    }

    public function get($idcontract){
     
        $sql = new Sql();
    
        $results = $sql->select("SELECT * FROM tb_contract  WHERE idcontract = :idcontract", array(
            ":idcontract"=>$idcontract
        ));
    
        $this->setData($results[0]);
     }

     public function delete(){

        $sql = new Sql();

        $sql->query("CALL sp_contract_delete(:idcontract)",[
            ":idcontract"=>$this->getidcontract()
        ]);

     }

}



?>