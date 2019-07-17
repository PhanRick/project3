<?php 
	/**
	 * 
	 */
	require_once'model/Function.class.php';
	class UserController{
		
		private $db;
		function __construct(){
			$this ->db = new DBManager();
		}

		//Login Validation
		function login(){
			if(isset($_POST['login'])){

				if(isset($_POST['username'])){
					$username=$_POST['username'];
				}else{
					$_SESSION['error'] =  "Username can't be empty,Please try agin";
				}

				if (isset( $_POST['password'])) {
					$password=md5($_POST['password']);
				}else{
					$_SESSION['error'] =  "Password can't be empty, Please Try agin";
				}

				if(empty($_SEESION['error'])){
					$userExist = $this->db->verify_existence("username",$username);
					$userValid= $this->db->verify_existence("valid",1);

					if ($userExist ==true && $userValid ==true){
						$LogginUser = $this->db->verify_login(array("username" => $username,"password"=>$password));

						if($LogginUser!=null &&!empty($LogginUser) && $LogginUser->getUsername()!=null ){
							$_SESSION["logged"]=($LogginUser);
						}else{
							$_SESSION['error']= "Username or password is wrong.";
						}
						header("Location: index.php");
					}else{
						$_SESSION['error']= "Username or password is wrong.";
						header("Location: index.php");
					}
				}
			}
		}

	//Function Logout
		function logout(){
			if (isset($_POST['logout'])) {
				unset($_SESSION['logged']);
				$logged_user=null;
			}
			header("Location: index.php");


		}

	//Validate Register
		function register(){
			if(isset($_POST['subscribe'])){

				if (isset( $_POST['username'])) {
					$username = $_POST['username'];
				}else{
					$_SESSION['error'] =  "Username can't be empty.";
				}

				if (isset( $_POST['password'])) {
					$password=md5($_POST['password']);
				}else{
					$_SESSION['error'] =  "Password can't be empty.";
				}

				if (isset( $_POST['confirm_password'])) {
					$confirm_password=md5($_POST['confirm_password']);

				}else{
					$_SESSION['error'] =  "Confirm password can't be empty.";
				}

				if (isset( $_POST['email'])) {
					$email=($_POST['email']);
				}else{
					$_SESSION['error'] =  "Valid email is missing.";	
				}

				if($password!=$confirm_password){
					$_SESSION['error'] =  "Password and confirm password does not match.";

				}

				if(isset($_FILES['avatar'])){
					$path = "uploads/";
					$filename = $_FILES['avatar']['tmp_name'];
					$file_size = $_FILES['avatar']['size'];
					$file_type = $_FILES['avatar']['type'];
					$name = $_FILES['avatar']['name'];

					$extArray = explode(".", $name);
					$ext = $extArray[COUNT($extArray) - 1];
					$error = array();
					$allowed_extensions = ["jpg", "jpeg", "png", "gif", "svg"];
					$ext = strtolower($ext);
					$destination = $path . $extArray[0] ."_" . time() . "." . $ext;


					if($_FILES['avatar']['error'] != 0){


						$_SESSION['error'] =  "Please upload your picture.";
						header("Location: index.php");
					}


					if($file_size > 12097152){  
						$_SESSION['error'] =  "The size is too big.";
						header("Location: index.php");
					}

					if(!in_array($ext, $allowed_extensions)){
						$_SESSION['error'] =  "Only image can be uploaded.";
					}
				}

				if(empty($_SESSION['error']))	{
					$userExist= $this->db->getUserByUsername($username);
					if(empty($userExist)){
						$moved = move_uploaded_file($filename, $destination);
						if ($moved) {
							$userArray=array(
								"ID"=>0,
								'username'  => $username,
								'password' 	=>$password,
								'email'  	=>  $email,
								'avatar' 	=> $destination,
								'status' 	=>0,
								'valid' =>	0);

							$user = new User($userArray);

							$emailExist = $this->db->verify_existence("email",$email);
							if ($emailExist==false) {
								$this->db->add_User($user);
								$subject = 	'Verification';
								$message = 'Please click the link below to comfirm registration.'."\r\n"."<a href=http://localhost/LabM4/Final_Lab/index.php?controller=user&action=validate&ID=".self::myEncoding($username)."> click here </a>";

								$sent_mail = Functions::send_email($email,$subject,$message);

								if($sent_mail)
									echo "Email sent";
								else
									echo "Email sending failed";

								header("Location:index.php");
							}else {	
								$_SESSION['error'] =  "Please try a new different Email adress.";
								header("Location:index.php");
							}

						}
					}else{
						$_SESSION['error'] =  "Please try a diffrent new username.";
					}
				}
			}
		}

		function validate(){
			if(isset($_GET['ID'])){
				$userIdentity = self::myDecoding($_GET['ID']);
				$Activate= $this->db->activateUser($userIdentity);
				$LoginUser=$this->db->getUserByUsername($userIdentity);
				$userForEmail=new User($LoginUser);
				$userForEmail->sendEmail("Confirmation","Thank you for confirmation.");
				header("Location: http://localhost/LabM4/Final_Lab/index.php");
			}
		}

		function myEncoding($w){
			$encoding = strrev($w);
			$encoding = str_rot13($encoding);
			$encoding = base64_encode($encoding);
			return $encoding;
		}
		function myDecoding($w){
			$decoding = base64_decode($w);
			$decoding = str_rot13($decoding);
			$decoding = strrev($decoding);
			return $decoding;
		}


	}
	

	?>