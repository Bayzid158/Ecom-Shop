<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php include_once '../classes/Brand.php'; ?>
<?php
    
    if (!isset($_GET['brand_id']) || $_GET['brand_id'] == NULL) {
        echo "<script>window.location = 'brandlist.php'; </script>";
    }else {
        $id = $_GET['brand_id'];
    }
    $brand = new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brand_id  = $_POST['brand_id'];
        $brand_name  = $_POST['brand_name'];
        $updateBrand = $brand->updateBrand($brand_id, $brand_name);
    }
 ?>

<?php 
    if (isset($updateBrand)) {
        echo $updateBrand;
    }
?>
<?php 
    $getBrand = $brand->getByBrandId($id);
    if ($getBrand) {
        while ($result = $getBrand->fetch_assoc()) {
            
 ?>
<div class="col-md-9">
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Add New Brand</h3>
      </div>
      <div class="panel-body">
        <form action="brandedit.php" method="post">
          <div class="form-group">
            <label>Brand ID</label>
            <input type="text" name="brand_id" class="form-control" value="<?php echo $result['brand_id']; ?>">
          </div>
          <div class="form-group">
            <label>Brand Name</label>
            <input type="text" name="brand_name" class="form-control" value="<?php echo $result['brand_name']; ?>">
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