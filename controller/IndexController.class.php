<?php 

/**
 * 
 */
class IndexController{
	private $db;
	function __construct(){
		$this->db = new DBManager();
	}

	function view(){
		$posts=array();
		$posts=$this->db->get_message();

		if (isset($_SESSION['logged'])) {
			$logged_user=($_SESSION['logged']);
			// var_dump($logged_user);				
		}

		$is_err=(isset( $_SESSION['error']));
		$error_message ="" ;

		if (isset($_SESSION['error']) ) {
			$error_message=$_SESSION['error'];

		}

		require_once 'view/MiniChat.php';

	}

	function error(){
		require_once "view/404.php";
	}

}

?>