<?php

namespace Curso\Model;

use \Curso\DB\Sql;
use \Curso\Model;

class Schedule extends Model{

    public static function listAll(){

        $sql = new Sql();
       return $sql->select("SELECT * FROM tb_shedule ORDER BY dtregister");

    }

    public function save(){

        $sql = new Sql();

        $results = $sql->select("CALL sp_shedule_save(:idshe, :desname, :desclass, :destime, :desdate, :desteacher)",[
            ":idshe"=>$this->getidshe(),
            ":desname"=>$this->getdesname(),
            ":desclass"=>$this->getdesclass(),
            ":destime"=>$this->getdestime(),
            ":desdate"=>$this->getdesdate(),
            ":desteacher"=>$this->getdesteacher()
        ]);

        $this->setData($results[0]);

    }

    public function get($idshe){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_shedule WHERE idshe = :idshe", [
            ":idshe"=>$idshe
        ]);

        $this->setData($results[0]);
    }

    public function delete(){

        $sql = new Sql();

        $sql->select("CALL sp_shedule_delete(:idshe)",[
            ":idshe"=>$this->getidshe()
        ]);

    }

}

?>