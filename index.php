<?php
session_start();
require_once("vendor/autoload.php");
require_once("functions.php");
use \Slim\Slim;
use \Curso\Page;
use \Curso\PageAdmin;
use \Curso\Model\User;
use \Curso\Model\Aluno;
use \Curso\Model\Contract;
use \Curso\Model\Order;
use \Curso\Model\Schedule;
use \Curso\Model\Stating;

$app = new slim();

$app->config("debug", false);

//index site
$app->get('/', function(){

    $page = new Page();

    $page->setTpl('index',[
        "msgSuccess"=>Aluno::getSuccess()
    ]);

});

$app->post('/create', function(){

    $index = new Aluno();

    $index->setData($_POST);

    $index->save();
    Aluno::setSuccess("Nosso consultor recebeu seu contato");
    header('Location: /');
    exit;

});


//admin
$app->get('/admin/', function(){

    User::verifyLogin();
   
    $statinguser = Stating::statingUser();
    $statingstudant= Stating::statingStudant();
    $statingconsultantd = Stating::statingConsultantd('9');
    $statingconsultante = Stating::statingConsultantd('5');
    $stagea = Stating::getStage('1');
    $stageb = Stating::getStage('2');
    $stagec = Stating::getStage('3');
    $d =  date('d/m/Y');
    
    $month = Stating::getMonth();
    //var_dump($month);
    $page = new PageAdmin();

    $page->setTpl('index', [
        "statinguser"=>$statinguser,
        "statingstudant"=>$statingstudant,
        "statingconsultantd"=>$statingconsultantd,
        "statingconsultante"=>$statingconsultante,
        "stagea"=>$stagea,
        "stageb"=>$stageb,
        "stagec"=>$stagec,
        "month"=>$month
       
    ]);

});


$app->get('/admin/login', function(){

    $page = new PageAdmin([
        "header"=>false,
        "footer"=>false
    ]);

    $page->setTpl('login', [
        "getErro"=>User::getError()
    ]);

});

$app->post('/admin/login', function(){

    if (!isset($_POST['deslogin']) || $_POST['despassword']==='') {

		User::setError("Preencha Login e Senha!");
		header("Location: /admin/login");
		exit;

	}

    User::login($_POST['deslogin'], $_POST['despassword']);

    header('Location: /admin');
    exit;

});

$app->get('/admin/logout', function(){
   
    User::logout();

    header('Location: /admin/login');
    exit;
});


//admin alunos
$app->get('/admin/alunos', function(){
     
    User::verifyLogin();

    $search = (isset($_GET['search'])) ? $_GET['search'] : "";
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Aluno::getPageSearch($search, $page);

	} else {

		$pagination = Aluno::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/alunos?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}


    $page = new PageAdmin();

    $page->setTpl("aluno", array(
        "aluno"=>$pagination['data'],
        "search"=>$search,
        'pages'=>$pages
    ));


});

$app->get('/admin/aluno/create', function(){
     
    User::verifyLogin();
    $page = new PageAdmin();

    $page->setTpl("aluno-create");

});

$app->get('/admin/aluno/view/:idaluno', function($idaluno){

    User::verifyLogin();

    $aluno = new Aluno();

    $aluno->get((int)$idaluno);
    $page = new PageAdmin();

    $page->setTpl("view-aluno", array(
        "aluno"=>$aluno->getValues()
    ));
    
});

//stage alunos
$app->get('/admin/aluno/stage/s1/:idaluno', function($idaluno){

    User::verifyLogin();

    $aluno = new Aluno();

    $aluno->get((int)$idaluno);
    $page = new PageAdmin();

    $page->setTpl("etapa-o", array(
        "aluno"=>$aluno->getValues()
    ));
    
});

$app->get('/admin/aluno/stage/s2/:idaluno', function($idaluno){

    User::verifyLogin();

    $aluno = new Aluno();

    $aluno->get((int)$idaluno);
    $page = new PageAdmin();

    $page->setTpl("etapa-a", array(
        "aluno"=>$aluno->getValues()
    ));
    
});

$app->get('/admin/aluno/stage/s3/:idaluno', function($idaluno){

    User::verifyLogin();

    $aluno = new Aluno();

    $aluno->get((int)$idaluno);
    $page = new PageAdmin();

    $page->setTpl("etapa-b", array(
        "aluno"=>$aluno->getValues()
    ));
    
});

//admin aluno method post 
$app->post('/admin/aluno/create', function(){
     
    User::verifyLogin();
    
    $aluno = new Aluno();

    $aluno->setData($_POST);

    $aluno->save();

    header('Location: /admin/alunos');
    exit;

});

$app->post('/admin/aluno/:idaluno', function($idaluno){
     
    User::verifyLogin();

    $aluno = new Aluno();


    $aluno->get((int)$idaluno);

    $aluno->setData($_POST);

    $aluno->save();

    header('Location: /admin/alunos');
    exit;

});

// admin users
$app->get('/admin/users', function(){
     
    User::verifyLogin();

    $user = $_SESSION[User::SESSION]['deslogin'];

    $users = User::listAll();
    
    $page = new PageAdmin();

    $page->setTpl("users", array(
        "users"=>$users,
        "user"=>$user
    ));
 var_dump($user);
});

$app->get('/admin/users/create', function(){
     
    User::verifyLogin();
    
    $page = new PageAdmin();

    $page->setTpl("users-create");

});

//admin users delete
$app->get('/admin/users/:iduser/delete', function($iduser){
     
    User::verifyLogin();

    $user = new User();

    $user->get((int)$iduser);

    $user->delete();

    header('Location: /admin/users');
    exit;

});

//admin aluno delete
$app->get('/admin/aluno/:idaluno/delete', function($idaluno){
     
    User::verifyLogin();
    $aluno = new Aluno();
   

    $aluno->get((int)$idaluno);

    $aluno->delete();

    header('Location: /admin/alunos');
    exit;

});

$app->get('/admin/users/:iduser', function($iduser){
     
    User::verifyLogin();
    
    $user = new User();

    $user->get((int)$iduser);

    $page = new PageAdmin();

    $page->setTpl("users-update", array(
        "user"=>$user->getValues()
    ));

});

//admin users method post
$app->post('/admin/users/create', function(){
     
    User::verifyLogin();

    $user = new User();

    $_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

    $user->setData($_POST);

    $user->save();

    header('Location: /admin/users');
    exit;

});

$app->post('/admin/users/:iduser', function($iduser){
     
    User::verifyLogin();

    $user = new User();

    $_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

    $user->get((int)$iduser);

    $user->setData($_POST);

    $user->setPhoto($_FILES["desphoto"]);
    $user->update();



    header('Location: /admin/users');
    exit;

});

//admin contrato

$app->get('/admin/contratos', function(){

    User::verifyLogin();
    
    $con = Contract::listAll();

    $page = new PageAdmin();

    $page->setTpl("contract", [
        "contract"=>$con
    ]);

});

$app->get('/admin/contrato/:idcontract/delete', function($idcontract){

    User::verifyLogin();

    $contract = new Contract();

    $contract->get((int)$idcontract);

    $contract->delete();

    header('Location: /admin/contratos');
    exit;
});

$app->get('/admin/contrato/create', function(){

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("contrato-create");

});

$app->get('/admin/contrato/view/:idcontract', function($idcontract){

    User::verifyLogin();

    $get = new Contract();
    $get->get((int)$idcontract);
    $page = new PageAdmin([
        "header"=>false,
        "footer"=>false
    ]);

    $page->setTpl("contract-view",[
        "contract"=>$get->getValues()
    ]);

});

$app->post('/admin/contrato/create', function(){

    User::verifyLogin();

    $contract = new Contract();

    $contract->setData($_POST);

    $contract->save();

    header('Location: /admin/contratos');
    exit;
   

});

//admin controle

$app->get('/admin/orders', function(){

    User::verifyLogin();

   
   
    $search = (isset($_GET['search'])) ? $_GET['search'] : "";
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Order::getPageSearch($search, $page);

	} else {

		$pagination = Order::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/orders?'.http_build_query([
				'page'=>$x+1,
                'search'=>$search
			]),
			'text'=>$x+1
		]);

	}
    $st = Order::getL($search);
    $sp = Order::getP($search);
    $page = new PageAdmin();

    $page->setTpl("order",[
        "order"=>$pagination['data'],
        "search"=>$search,
        "lari"=>$st,
        "prof"=>$sp,
        "pages"=>$pages
    ]);

});

$app->get('/admin/order/create', function(){

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("order-create");

});

$app->get('/admin/order/starting', function(){

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("order-startistic");

});

$app->get('/admin/order/:idcontrol/delete', function($idcontrol){

    User::verifyLogin();

    $controls = new Order();

    $controls->get((int)$idcontrol);

    $controls->delete();

    header('Location: /admin/orders');
    exit;

});

$app->get('/admin/order/:idcontrol', function($idcontrol){

    User::verifyLogin();

    $controls = new Order();

    $controls->get((int)$idcontrol);

    $page = new PageAdmin();

    $page->setTpl("order-update",[
        "order"=>$controls->getValues()
    ]);

});

$app->post('/admin/order/create', function(){

    User::verifyLogin();

    $control = new Order();

    $control->setData($_POST);

    $control->save();

    header('Location: /admin/orders');
    exit;

});

$app->post('/admin/order/:idcontrol', function($idcontrol){

    User::verifyLogin();

    $controls = new Order();

    $controls->get((int)$idcontrol);

    $controls->setData($_POST);

    $controls->save();

    header('Location: /admin/orders');
    exit;

});

//agendar
$app->get('/admin/schedule/:idshe/delete', function($idshe){

    User::verifyLogin();

    $shedule = new Schedule();

    $shedule->get((int)$idshe);

    $shedule->delete();

    header('Location: /admin/schedule');
    exit;

});

$app->get('/admin/schedule', function(){

    User::verifyLogin();

    $shedule = Schedule::listAll();
    $page = new PageAdmin();

    $page->setTpl('shedules',[
        "schedule"=>$shedule
    ]);

});

$app->get('/admin/schedule/create', function(){

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl('shedule-create');

});

$app->post('/admin/schedule/create', function(){

    User::verifyLogin();

    $shedule = new Schedule();

    $shedule->setData($_POST);

    $shedule->save();

    header('Location: /admin/schedule');
    exit;

});
$app->run();

?>