<?php

use \Curso\Model\Contract;
use \Curso\Model\User;

function encurtarTexto($texto,$tamPermitido) {
    if (strlen($texto) > $tamPermitido) 
       echo substr($texto, 0, $tamPermitido) . "";
    else
       echo $texto;
  }

  function fomatDate($date){
   return date('d/m/Y', strtotime($date));
  }

  function getUserName()
{

	$user = User::getFromSession();

	return $user->getdesperson();

}

function getUserPhoto()
{

	$user = User::getFromSession();

	return $user->getdesphoto();

}

function getUserId()
{

	$user = User::getFromSession();

	return $user->getidperson();

}

?>