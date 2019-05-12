<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/Product.php'; ?>
<?php
    $product = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insertProduct  = $product->prductInset($_POST, $_FILES);
    }
 ?>

 <?php 
    if (isset($insertProduct)) {
        echo $insertProduct;
    }
?>
<div class="col-md-9">
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Add New Product</h3>
      </div>
      <div class="panel-body">
        <form action="productadd.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name..." value="">
          </div>
          <div class="form-group">
            <label>Category</label>
            <select id="select" name="cat_id" class="form-control">
                <option>Select Category</option>
                <?php
                    $getCat = $cat->getAllCat();
                        if ($getCat) {
                          $i=0;
                          while ($result = $getCat->fetch_assoc()) {
                            $i++;
                ?>
                <option value="<?php echo $result['cat_id']; ?>"><?php echo $result['cat_name']; ?></option>
                <?php } } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Brand</label>
            <select id="select" name="brand_id" class="form-control">
                <option>Select Brand</option>
                <?php
                    $getBrand = $BRAND->getAllBrand();
                        if ($getBrand) {
                          $i=0;
                          while ($result = $getBrand->fetch_assoc()) {
                            $i++;
                ?>
                <option value="<?php echo $result['brand_id']; ?>"><?php echo $result['brand_name']; ?></option>
                <?php } } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="body" class="form-control tinymce" placeholder="Add Product Description Here..."></textarea>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" placeholder="Enter Price...">
          </div>
          <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="image" class="form-control" />
          </div>
          <div class="form-group">
            <label>Product Type</label>
            <select id="select" name="type" class="form-control">
                <option>Select Type</option>
                <option value="0">Featured</option>
                <option value="1">None</option>
            </select>
          </div>
          <input type="submit" class="btn btn-default" value="Save">
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


