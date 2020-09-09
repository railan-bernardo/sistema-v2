<?php

namespace Curso;

class Model {

    private $value = [];

    public function __call($name, $args){

        $method = substr($name, 0, 3);
        $fileName = substr($name, 3, strlen($name));

        switch($method){
            case "get":
              return  (isset($this->value[$fileName])) ? $this->value[$fileName] : NULL;
            break;

            case "set":
                $this->value[$fileName] = $args[0];
            break;
        }
    }

    public function setData($data = array()){
        foreach($data as $key => $value){
            $this->{"set".$key}($value);
        }
    }

    public function getValues(){
        return $this->value;
    }

}

?>