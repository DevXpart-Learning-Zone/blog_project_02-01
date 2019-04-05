<?php
	class Blog
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
		! Add Blog Category List
		!------------------------------------------
		*/
	    public function categoryList($data)
	    {
	    	
	    }


	    /*
		!------------------------------------------
		! Save Category
		!------------------------------------------
		*/
	    public function saveCategory($data)
	    {
	    	 	$cat_name = $this->help->validation($data['cat_name']);
	    	 	if (empty($cat_name))
	    	 	{
	    	 		$this->message = "<p class='alert alert-warning'>Category name must not ne empty</p>";
	    	 	}else{
	    	 		$sql =  "select * from tbl_category where cat_name = :cat_name";
		    		$stmt = $this->db->prepare($sql);
		    		$stmt->bindValue(':cat_name', $cat_name);
			        $stmt->execute();
			        $row = $stmt->rowCount() ;

			        if ($row> 0)
			        {
			        	$this->message = "<p class='alert alert-warning'>Category already exist</p>";
			        }else{
			        	$sql = "insert into tbl_category (cat_name) values(:cat_name)";
				        $stmt =  $this->db->prepare($sql);
				        $stmt->bindValue(':cat_name', $cat_name);
				        $result = $stmt->execute();
				        $this->message = "<p class='alert alert-success'>Category inserted succesfully</p>";
			        }
	    	 	}

	    	 	return $this->message;
	    		
	    }

	}

 ?>