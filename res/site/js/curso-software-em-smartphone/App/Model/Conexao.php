<?php

namespace App\Model;

class Conexao{

    private static $instance;

    public static function getConn(){

        if(!isset(self::$instance)):
            self::$instance = new \PDO('mysql:host=localhost;dbname=cacursos_dbpage;charset=utf8','cacursos_adminuser20','Ne_yo385x');
        endif;

        return self::$instance;
    }

}