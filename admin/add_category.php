<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
$message = '';
if (isset($_POST['cat_name'])) {

 $message =  $blog->saveCategory($_POST);
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
                <h4 class="card-title">Add Category</h4>
                <p class="card-description">
                  Here blog category will be added
                </p>
                <form class="forms-sample" action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category  Name</label>
                    <input type="text" name="cat_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name Here">
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
    <?php include 'inc/footer.php' ?>
