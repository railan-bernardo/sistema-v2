<?php

namespace App\Model;

class Dao{

    public function create(User $p){

        $sql = "INSERT INTO users_leads (nome, email, phone, estado, cidade,  curso, unidade, horario) VALUES (?,?,?,?,?,?,?,?)";

        $smt = Conexao::getConn()->prepare($sql);
        $smt->bindValue(1, $p->getNome());
        $smt->bindValue(2, $p->getEmail());
        $smt->bindValue(3, $p->getPhone());
        $smt->bindValue(4, $p->getCidade());
        $smt->bindValue(5, $p->getEstado());
        $smt->bindValue(6, $p->getCurso());
        $smt->bindValue(7, $p->getUnidade());
        $smt->bindValue(8, $p->getHorario());
        if(empty($smt)){
            echo "Preencha os campos";
        }else{
            $smt->execute();
        }

        


    }

    public function reade(){

    }

}