<?php 
/**
 * 
 */
class PostController{
	private $db;

	function __construct(){
		$this->db = new DBManager();
	}

	function send(){
		if(isset($_POST['send'])){
			if (isset( $_POST['comment']) && (trim($_POST['comment']))!="") {

				$comment=$_POST['comment'];
			}else{
				$_SESSION['error'] =  "Message can't be empty.";
				require_once"view/minichat.php";
			}

			if(empty($_SESSION['error'])){

				$logged_user=($_SESSION['logged']);
				$array_message = array("username"=>  $logged_user->getUsername(), 
					"avatar"=>$logged_user->getAvatar(), "message"=>$comment);
				$message =new message($array_message);
				$this->db->set_message($message);

				header("Location: index.php");


			}


		}
	}

}
?>