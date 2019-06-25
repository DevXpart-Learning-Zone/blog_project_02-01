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
	    public function categoryList()
	    {
	    	$sql =  "select * from tbl_category order by cat_name asc";
    		$stmt = $this->db->prepare($sql);
	        $stmt->execute();
	        return $stmt;
	    }

	    /*
		!-----------------------------------
		! Update Category
		!-----------------------------------
	    */
	    public function updateCategory($data)
	    {
	    	$cat_name 	= $this->help->validation($data['cat_name']);
	    	$cat_id 	= $this->help->validation($data['cat_id']);
	    	$sql = "update tbl_category set cat_name =  :cat_name where cat_id = :cat_id";
	        $stmt =  $this->db->prepare($sql);
	        $stmt->bindValue(':cat_name', $cat_name);
	        $stmt->bindValue(':cat_id', $cat_id);
	        $stmt->execute();
	        $this->message = "<p class='alert alert-success'>Category updated successfully</p>";
	        return $this->message;

	    }

	    /*
		!-----------------------------------
		! Delete Category
		!-----------------------------------
	    */
	    public function deleteCategory($data)
	    {
	    	$cat_id = $this->help->validation($data['cat_id']);
	    	$sql  	= "delete from tbl_category where cat_id = :cat_id";
	        $stmt 	=  $this->db->prepare($sql);
	        $stmt->bindValue(':cat_id', $cat_id);
	        $stmt->execute();
	        $this->message = "<p class='alert alert-success'>Category deleted successfully</p>";
	        return $this->message;

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


	    /*
		!------------------------------------------
		! Save Category
		!------------------------------------------
		*/
	    public function saveBlog($data)
	    {
    	 	$blog_title 	= $this->help->validation($data['blog_title']);
    	 	$cat_id 		= $this->help->validation($data['cat_id']);
    	 	$blog_details 	= $this->help->validation($data['blog_details']);
    	 	$user_id 		= Session::get('user_id');
    	 	$blog_status 		= 'Active';
    	 	
        	$sql = "insert into tbl_blog (blog_title,cat_id,blog_details,user_id,blog_status) values(:blog_title,:cat_id,:blog_details,:user_id,:blog_status)";
	        $stmt =  $this->db->prepare($sql);
	        $stmt->bindValue(':blog_title', $blog_title);
	        $stmt->bindValue(':cat_id', $cat_id);
	        $stmt->bindValue(':blog_details', $blog_details);
	        $stmt->bindValue(':user_id', $user_id);
	        $stmt->bindValue(':blog_status', $blog_status);
	        $result = $stmt->execute();

	        //get last blog id
	        $sql    = "select blog_id from tbl_blog order by blog_id desc limit 1";
	        $stmt   =  $this->db->prepare($sql);
	        $stmt->execute();
	        $lastid = $stmt->fetch(PDO::FETCH_OBJ);

	        // upload image
		    if (!empty($_FILES["image"]["tmp_name"])) {

	            $temp = explode(".", $_FILES["image"]["name"]);
	            $newfilename = "image-".round(microtime(true)) . '.' . end($temp);
	            move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/blog/" . $newfilename);
	            $stmt = $this->db->prepare("update tbl_blog set image =:image where blog_id=:id");
	            $stmt->bindParam(':image',$newfilename);
	            $stmt->bindValue(':id',$lastid->blog_id);
	            $stmt->execute();
		    } 

	        $this->message = "<p class='alert alert-success'>Blog inserted succesfully</p>";
    	 	return $this->message;
	    }

	    /*
		!------------------------------------------
		! Show Blogs in frontend
		!------------------------------------------
		*/
	    public function showBlog()
	    {
	        $sql    = "select * from tbl_blog join tbl_category on tbl_category.cat_id = tbl_blog.cat_id order by tbl_blog.blog_id desc";
	        $stmt   =  $this->db->prepare($sql);
	        $stmt->execute();
	        $blogs = $stmt->fetchAll(PDO::FETCH_OBJ);
	        return $blogs; 
	    }

	}

 ?>