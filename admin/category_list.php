<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
$message = '';
if (isset($_POST['cat_name'])) {
  $message = $blog->updateCategory($_POST);
}
if (isset($_GET['action'])  && $_GET['action'] == 'delete') {
  $message = $blog->deleteCategory($_GET);
  
}



?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row purchace-popup">

    </div>
    <?php echo $message ; ?>
    <div class="row">

      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Category List</h4>
            
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <th>Serial</th>
                  <th>Category Name</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  $categories  = $blog->categoryList()->fetchAll(PDO::FETCH_OBJ);
                  foreach ($categories as $category) { ?>

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $category->cat_name; ?></td>
                      <td><a  type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $i; ?>" class="btn btn-sm btn-primary">Edit</a> <a href="?action=delete&cat_id=<?php echo $category->cat_id; ?>" class="btn btn-sm btn-danger" onclick="return(confirm('are you sure to delete?'))">Delete</a></td>



                      <!-- MODAL START -->
                      <div class="modal fade" id="myModal<?php echo $i; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Update Category</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <form action="" method="post">
                            <div class="modal-body">
                              <input type="text" name="cat_name" value="<?php echo $category->cat_name; ?>" class="form-control">

                              <input type="hidden" name="cat_id" value="<?php echo $category->cat_id; ?>">
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-success">Update</button>
                            </div>
                          </form>

                          </div>
                        </div>
                      </div>
                      <!-- MODAL END -->


                    </tr>
                    <?php  $i++;  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>

      
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <?php include 'inc/footer.php' ?>
