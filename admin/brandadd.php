<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php include_once '../classes/Brand.php'; ?>
<?php
    $brand = new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brand_name  = $_POST['brand_name'];
        $brand_id  = $_POST['brand_id'];
        $insertBrand = $brand->brandInsert($brand_name, $brand_id);
    }
 ?>

 <?php 
    if (isset($insertBrand)) {
        echo $insertBrand;
    }
?>

<div class="col-md-9">
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Add New Brand</h3>
      </div>
      <div class="panel-body">
        <form action="brandadd.php" method="post">
          <div class="form-group">
            <label>Brand ID</label>
            <input type="text" name="brand_id" class="form-control" placeholder="Enter Brand ID Must Be Integer..." value="">
          </div>
          <div class="form-group">
            <label>Brand Name</label>
            <input type="text" name="brand_name" class="form-control" placeholder="Enter Brand Name..." value="">
          </div>
          <input type="submit" class="btn btn-default" value="Submit">
        </form>
      </div>
      </div>
  </div>
<?php include 'inc/footer.php';?>