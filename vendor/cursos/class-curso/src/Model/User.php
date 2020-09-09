<?php

namespace Curso\Model;

use \Curso\DB\Sql;
use \Curso\Model;

class User extends Model{

    const SESSION = "User";
    const SUCCESS = "success";
    const ERROR = "error";

    public static function getFromSession()
	{

		$user = new User();

		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0) {

			$user->setData($_SESSION[User::SESSION]);

		}

		return $user;

	}

    public static function login($login, $password){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b ON a.idperson = b.idperson WHERE a.deslogin = :LOGIN", array(
            ":LOGIN"=>$login
        ));

        if(count($results) === 0){
            throw new \Exception("Login ou senha inválido");
            
        }

        $data = $results[0];

        if(password_verify($password, $data["despassword"]) === true){

            $user = new User();

            $data['desperson'] = utf8_encode($data['desperson']);

            $user->setData($data);
            
            $_SESSION[User::SESSION] = $user->getValues();

            return $user;
        }else{
            throw new \Exception("Login ou senha inválido");
        }

    }

    public static function verifyLogin($inadmin = true){
       if(
            !isset($_SESSION[User::SESSION])
            ||
            !$_SESSION[User::SESSION]
            ||
            !(int)$_SESSION[User::SESSION]["iduser"] > 0
            ||
            (bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin
       ){
            header('Location: /admin/login');
            exit;
       }
    }



public static function logout(){
    
    $_SESSION[User::SESSION] = NULL;

 }

public static function listAll(){

     $sql = new Sql();

    return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson");
 }

 public function save(){

    $sql = new Sql();

   $results = $sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :desskill, :inadmin) ", array(

        ":desperson"=>$this->getdesperson(),
        ":deslogin"=>$this->getdeslogin(),
        ":despassword"=>User::getPasswordHash($this->getdespassword()),
        ":desemail"=>$this->getdesemail(),
        ":desskill"=>$this->getdesskill(),
        ":inadmin"=>$this->getinadmin()

    ));

    $this->setData($results[0]);

 }

 public function get($iduser){
     
    $sql = new Sql();

    $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", array(
        ":iduser"=>$iduser
    ));

    $this->setData($results[0]);
 }


 public function update(){
    $sql = new Sql();

    $results = $sql->select("CALL sp_usersupdate_update(:iduser, :desperson, :deslogin, :despassword, :desemail, :desskill, :inadmin) ", array(
        ":iduser"=>$this->getiduser(),
         ":desperson"=>utf8_decode($this->getdesperson()),
         ":deslogin"=>$this->getdeslogin(),
         ":despassword"=>User::getPasswordHash($this->getdespassword()),
         ":desemail"=>$this->getdesemail(),
         ":desskill"=>$this->getdesskill(),
         ":inadmin"=>$this->getinadmin()
 
     ));
 
     $this->setData($results[0]);
 }

 public function delete(){
    
    $sql = new Sql();

    $sql->query("CALL sp_users_delete(:iduser)", array(
        ":iduser"=>$this->getiduser()
    ));
 }

 //gera um hash da senha
 public static function getPasswordHash($password){
    return password_hash($password, PASSWORD_DEFAULT, [
        'cost'=>12
    ]);
 }

 public function checkPhoto()
	{

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"admin" . DIRECTORY_SEPARATOR . 
			"uploads" . DIRECTORY_SEPARATOR . 
			$this->getidperson() . ".jpg"
			)) {

			$url = "/res/admin/uploads/" . $this->getidperson() . ".jpg";

		} else {

			$url = "/res/admin/uploads/default.jpg";

		}

		return $this->setdesphoto($url);

    }
    
    public function getValues()
	{

		$this->checkPhoto();

		$values = parent::getValues();

		return $values;

    }
    
    public function setPhoto($file)
	{

		$extension = explode('.', $file['name']);
		$extension = end($extension);

		switch ($extension) {

			case "jpg":
			case "jpeg":
			$image = imagecreatefromjpeg($file["tmp_name"]);
			break;

            case "gif":
			$image = imagecreatefromgif($file["tmp_name"]);
            break;
            
            case "webp":
                $image = imagecreatefromwebp($file["tmp_name"]);
            break;

			case "png":
			$image = imagecreatefrompng($file["tmp_name"]);
			break;

		}

		$dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"admin" . DIRECTORY_SEPARATOR . 
			"uploads" . DIRECTORY_SEPARATOR . 
			$this->getidperson() . ".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto();

    }

    public static function setError($msg)
	{

		$_SESSION[User::ERROR] = $msg;

    }
    
    public static function getError()
	{

		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

		User::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[User::ERROR] = NULL;

	}
    
    public static function setSuccess($msg)
	{

		$_SESSION[User::SUCCESS] = $msg;

	}
}

?>