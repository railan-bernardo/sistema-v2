<?php

namespace App\Model;

class User{

private $id;
private $nome;
private $email;
private $phone;
private $cidade;
private $estado;
private $curso;
private $unidade;
private $horario;

public function getId(){
    return $this->id;
}

public function setId($id){
     $this->id = $id;
}

public function getNome(){
    return $this->nome;
}

public function setNome($nome){
     $this->nome = $nome;
}

public function getEmail(){
    return $this->email;
}

public function setEmail($email){
     $this->email = $email;
}

public function getPhone(){
    return $this->phone;
}

public function setPhone($phone){
     $this->phone = $phone;
}

public function getCidade(){
    return $this->cidade;
}

public function setCidade($cidade){
     $this->cidade = $cidade;
}

public function getEstado(){
    return $this->estado;
}

public function setEstado($estado){
     $this->estado = $estado;
}

public function getCurso(){
    return $this->curso;
}

public function setCurso($curso){
     $this->curso = $curso;
}

public function getUnidade(){
    return $this->unidade;
}

public function setUnidade($unidade){
     $this->unidade = $unidade;
}

public function getHorario(){
    return $this->horario;
}

public function setHorario($horario){
     $this->horario = $horario;
}

}