<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php include_once '../classes/Category.php'; ?>
<?php
    
    if (!isset($_GET['cat_id']) || $_GET['cat_id'] == NULL) {
        echo "<script>window.location = 'catlist.php'; </script>";
    }else {
        $id = $_GET['cat_id'];
    }
    $cat = new Category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cat_id  = $_POST['cat_id'];
        $cat_name  = $_POST['cat_name'];
        $cat_description  = $_POST['cat_description'];
        $updateCat = $cat->updateCat($cat_id, $cat_name, $cat_description);
    }
 ?>

<?php 
    if (isset($updateCat)) {
        echo $updateCat;
    }
?>
<?php 
    $getCat = $cat->getByCatId($id);
    if ($getCat) {
        while ($result = $getCat->fetch_assoc()) {
            
 ?>
<div class="col-md-9">
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Add New Category</h3>
      </div>
      <div class="panel-body">
        <form action="catedit.php" method="post">
          <div class="form-group">
            <label>Category ID</label>
            <input type="text" name="cat_id" class="form-control" value="<?php echo $result['cat_id']; ?>">
          </div>
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="cat_name" class="form-control" value="<?php echo $result['cat_name']; ?>">
          </div>
          <div class="form-group">
            <label>Category Description</label>
            <textarea name="cat_description" name="editor1" class="form-control tinymce" placeholder=""><?php echo $result['cat_description']; ?></textarea>
          </div>
          <input type="submit" class="btn btn-default" value="Submit">
        </form>
        <?php } } ?>
      </div>
      </div>
  </div>
<!-- Load TinyMCE -->
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="plugins/tinymce/tinymce.min.js"></script>
  <script type="text/javascript" src="plugins/tinymce/init-tinymce.js"></script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>