<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php include_once '../classes/Category.php'; ?>
<?php
    $cat = new Category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cat_name  = $_POST['cat_name'];
        $cat_id  = $_POST['cat_id'];
        $cat_description  = $_POST['cat_description'];
        $insertCat = $cat->catInsert($cat_name, $cat_id,  $cat_description);
    }
 ?>
<?php 
    if (isset($insertCat)) {
            echo $insertCat;
        }
?>
<div class="col-md-9">
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Add New Category</h3>
      </div>
      <div class="panel-body">
        <form action="catadd.php" method="post">
          <div class="form-group">
            <label>Category ID</label>
            <input type="text" name="cat_id" class="form-control" placeholder="Enter Category ID Must Be Integer..." value="">
          </div>
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="cat_name" class="form-control" placeholder="Enter Category Name..." value="">
          </div>
          <div class="form-group">
            <label>Category Description</label>
            <textarea name="cat_description" class="form-control tinymce" placeholder=""></textarea>
          </div>
          <input type="submit" class="btn btn-default" value="Submit">
        </form>
      </div>
      </div>
  </div>
<!-- Load TinyMCE -->
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="plugins/tinymce/tinymce.min.js"></script>
  <script type="text/javascript" src="plugins/tinymce/init-tinymce.js"></script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>