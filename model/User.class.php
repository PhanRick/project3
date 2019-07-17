<?php 
/**
 * 
 */
class User{

	private $ID;
	private $username;
	private $password;
	private $email;
	private $avatar;
	private $status;
	private $valid;


	function __construct($userDB){
		$this ->ID = $userDB['ID'];
		$this ->username = $userDB['username'];
		$this ->password = $userDB['password'];
		$this ->email = $userDB['email'];
		$this ->avatar = $userDB['avatar'];
		$this ->status = $userDB['status'];
		$this ->valid = $userDB['valid'];
	}

    /**
     * @return mixed
     */
    public function getID()
    {
    	return $this->ID;
    }

    /**
     * @param mixed $ID
     *
     * @return self
     */
    public function setID($ID)
    {
    	$this->ID = $ID;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
    	return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return self
     */
    public function setUsername($username)
    {
    	$this->username = $username;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
    	return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
    	$this->password = $password;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
    	return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
    	$this->email = $email;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
    	return $this->avatar;
    }

    /**
     * @param mixed $avatar
     *
     * @return self
     */
    public function setAvatar($avatar)
    {
    	$this->avatar = $avatar;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
    	return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return self
     */
    public function setStatus($status)
    {
    	$this->status = $status;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getValid()
    {
    	return $this->valid;
    }

    /**
     * @param mixed $valid
     *
     * @return self
     */
    public function setValid($valid)
    {
    	$this->valid = $valid;

    	return $this;
    }

    // public function sendEmail($subject, $msg_body){
    // 	$to       = self::getEmail();
    // 	$headers  = 'From: herzing.prog@gmail.com' . "\r\n" .
    // 	'MIME-Version: 1.0' . "\r\n" .
    // 	'Content-type: text/html; charset=utf-8';

    // 	if(mail($to, $subject, $msg_body, $headers))
    // 		return true;
    // 	else
    // 		return false;

    // }
}

?>