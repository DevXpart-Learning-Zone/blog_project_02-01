<?php
	
	class Helper
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
		! data validation
		!------------------------------------------
		*/
	    public function validation($data)
	    {
	    	$data = trim($data);
	    	$data = htmlspecialchars($data);
	    	$data = stripslashes($data);
	    	return $data;
	    }
	}

 ?>