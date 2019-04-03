<?php
	
	class User
	{
		private $db;

		/*
		!------------------------------------------
		! Constructor Load First
		!------------------------------------------
		*/
	    public function __construct()
	    {

	        $this->db = new Database();
	    }

	    /*
		!------------------------------------------
		! User login
		!------------------------------------------
		*/
	    public function userLogin($data)
	    {
	    	echo "<pre>";
	    	print_r($data);
	    	die;
	    }
	}

 ?>