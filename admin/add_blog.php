<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
$message = '';
if (isset($_POST['blog_title'])) {

 $message =  $blog->saveBlog($_POST);
}

?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row purchace-popup">

    </div>
    <?php echo $message ; ?>
    <div class="row">

      <div class="col-md-9 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">

          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Add Blog</h4>

                <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Blog Title</label>
                    <input type="text" name="blog_title" class="form-control" id="exampleInputEmail1" placeholder="Enter blog title">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Blog Category</label>
                    <select name="cat_id" class="form-control">
                     <option value="" disabled="" selected="">Select Category</option>
                     <?php 
                     $stmt = $blog->categoryList();
                     $categories = $stmt->fetchAll(PDO::FETCH_OBJ);

                     foreach($categories as $category){ ?>
                      <option value="<?php echo $category->cat_id; ?>" ><?php echo $category->cat_name; ?></option>

                    <?php } ?>

                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Blog Description</label>
                  <textarea name="blog_details" cols="30" rows="10" class="form-control" placeholder="Enter blog detail here"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Select Image</label>
                  <input type="file" name="image" class="form-control" >
                </div>

                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button type="reset" class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
  <script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'blog_details' );
  </script>
  <?php include 'inc/footer.php' ?>
