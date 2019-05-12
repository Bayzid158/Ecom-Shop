<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php include_once '../classes/Product.php'; ?>
<?php
    if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
        echo "<script>window.location = 'productlist.php'; </script>";
    }else {
        $prid = preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['proid']);
    }
    $pd = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateProduct  = $pd->productUpdate($_POST, $_FILES, $prid);
    }
 ?>

<?php 
    $getProduct = $pd->getByProductId($prid);
    if ($getProduct) {
        while ($result1 = $getProduct->fetch_assoc()) {
            
 ?>
<div class="col-md-9">
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Edit Product</h3>
      </div>
      <?php 
    if (isset($updateProduct)) {
        echo $updateProduct;
    }
?>
      <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="product_name" class="form-control" value="<?php echo $result1['product_name']; ?>">
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
                <option
                  <?php
                      if ($result1['cat_id'] == $result['cat_id']) { ?>
                        selected = "selected"
                  <?php } ?>
                        value="<?php echo $result['cat_id']; ?>"><?php echo $result['cat_name']; ?></option>
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
                <option
                  <?php
                      if ($result1['brand_id'] == $result['brand_id']) { ?>
                        selected = "selected"
                  <?php } ?>
                        value="<?php echo $result['brand_id']; ?>"><?php echo $result['brand_name']; ?></option>
                <?php } } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="body" class="form-control tinymce" ><?php echo $result1['body']; ?></textarea>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" value="<?php echo $result1['price']; ?>">
          </div>
          <div class="form-group" align="center">
            <img src="<?php echo $result1['image']; ?>" height="250px" width="250px">
          </div>
          <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="image" value="" class="form-control" />
          </div>
          <div class="form-group">
            <label>Product Type</label>
            <select id="select" name="type" class="form-control">
                <option>Select Type</option>
                <?php if ($result1['type'] == 0) { ?>
                  <option selected="selected" value="0">Featured</option>
                  <option value="1">None</option>
                  <?php } else { ?>
                    <option value="0">Featured</option>
                    <option selected="selected" value="1">None</option>
                  <?php } ?>
            </select>
          </div>
          <input type="submit" name="submit" class="btn btn-default" value="Update">
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