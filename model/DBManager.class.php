<?php 
spl_autoload_register(function($class_name){
	require_once $class_name . '.class.php';
});

/**
 * 
 */
class DBManager{

	private $db;
	
	function __construct(){
		$host 	= "localhost";
		$user 	= "root";
		$pass 	= "";
		$dbname = "labm4";

		try {
			$this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		} catch (Exception $e) {
			die("Database connection error<br> " . $e->getMessage());
		}

	}

	//function for register
	function add_User($user){
		$query=$this->db->prepare("INSERT INTO users VALUES (DEFAULT, :username, :password,:email ,:avatar, DEFAULT,DEFAULT);");
		$query->execute(array(
			'username'  => 		$user->getUsername(),
			'password' 	=>		$user->getPassword(),
			'email'  	=>  	$user->getEmail(),
			'avatar' 	=>		$user->getAvatar(),
		));
	}
	
	//Get User information
	public function getUserByUsername($username){
		$query =$this->db->prepare("SELECT * FROM users where (username=?);");
		$query-> execute(array($username));
		$user= $query->fetch(PDO::FETCH_ASSOC);
		return $user;

	}

	

	//Update user valid to 1 for true
	function activateUser($username){
		$Validate=true;
		try {
			$query=$this->db->prepare("UPDATE users set valid=1 where (username=? AND valid=0);");
			$query -> execute(array($username));
		} catch (Exception $e) {
			$Validate=false;
			return $Validate;
		}
		return $Validate;
	}

	//Get all message
	function get_message(){
		$query = $this->db->query("SELECT * FROM posts");
		$posts = $query -> fetchAll(PDO:: FETCH_ASSOC);
		return array_reverse($posts);
	}

	//Insert message to posts
	function set_message($message){
		$query = $this->db->prepare("INSERT INTO posts VALUES(DEFAULT, :username, :avatar, :comment);");
		$query->execute(array(
			'username'  => $message->getUsername(),
			'avatar'  	=> $message->getAvatar(),
			'comment'  	=> $message->getMessage()
		));
	}

	//verify user account
	function  verify_login($user){
		$query = $this ->db->prepare("SELECT * FROM users WHERE(username = :username AND password = :password AND valid=1);");
		$query->execute(array(
			'username' => $user['username'],
			'password' => $user['password']
		));
		$data=$query->fetch(PDO::FETCH_ASSOC);
		$obj= new User($data);
		return $obj;
	}

	function  verify_existence($col, $val){
		$query = $this->db->prepare("SELECT * FROM users where($col=?);");
		$query->execute(array(
			$val
		));
		$data=$query->fetch(PDO::FETCH_ASSOC);
		if (!empty($data))
			return true;
		else
			return false;

	}

}

?>