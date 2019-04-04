<?php
		
	include 'Session.php';	
	include 'Helper.php';	

	class User
	{
		private $db;
		private $help;
		private $message;

		/*
		!------------------------------------------
		! Constructor Load First
		!------------------------------------------
		*/
	    public function __construct()
	    {
	        $this->db 	= new Database();
	        $this->help = new Helper();
	    }

	    /*
		!------------------------------------------
		! User login
		! @param array
		!------------------------------------------
		*/
	    public function userLogin($data)
	    {
	    	$username = $this->help->validation($data['username']);
	    	$password = $this->help->validation($data['password']);

	    	if (empty($username) || empty($password)) 
	    	{
	    		$this->message = "<p class='alert alert-warning'>Username or password must not be empty</p>";
	    	}else{

	    		$sql =  "select * from tbl_user where username = :username and password =:password";
	    		$stmt = $this->db->prepare($sql);
	    		$stmt->bindValue(':username', $username);
	    		$stmt->bindValue(':password', md5($password));
		        $stmt->execute();
		        $row = $stmt->rowCount() ;

		        if ($row> 0) {

		        	$fetchvalue = $stmt->fetch(PDO::FETCH_OBJ);
		        	Session::init();
		        	Session::set('login',true);
		        	Session::set('user_id',$fetchvalue->user_id);
		        	Session::set('user_role',$fetchvalue->role);
		        	Session::set('user_email',$fetchvalue->email);
		        	//echo "<pre>";
		        	//print_r($_SESSION); die;

		          	header('location: index.php');

		        } else {
		           $this->message = "<p class='alert alert-warning'>Username or password not matched</p>";
		        }

	    	}
	    	return $this->message;

	    }
	}

 ?>