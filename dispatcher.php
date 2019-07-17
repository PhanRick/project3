<?php 

$controllers = array(
	"index"=>array("view","error"),
	"user"=>array("login","logout","register","validate","error"),
	"post"=>array("send","error")	
);

/*Validate if the page exist then validate if the action exist*/

if(array_key_exists($controller, $controllers)){
	if(in_array($action, $controllers[$controller])){
		dispatch($controller, $action);
	}else{
		dispatch("index", "error");
	}
}else{
	dispatch("index", "error");
}

function dispatch($controller,$action){
	require_once "controller/".ucfirst($controller)."Controller.class.php";
	require_once "model/DBManager.class.php";
	require_once "model/Message.class.php";
	require_once "model/User.class.php";
	session_start();
	switch ($controller) {
		case 'index':
		$controller = new IndexController();
		break;

		case 'user':
		$controller = new UserController();
		break;

		case 'post':
		$controller = new PostController();
		break;
	}

	$controller->{$action}();
}
?>