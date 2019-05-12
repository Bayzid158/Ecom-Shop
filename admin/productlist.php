<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/Product.php'; ?>
<?php
    $product = new Product();
    if (isset($_GET['productDelete'])) {
    	$id = $_GET['productDelete'];
    	$productDelete = $product->productDeleteById($id);
    }
?>
<div class="col-md-9">
            <!-- Product List -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Product List</h3>
              </div>
              <?php 
                  if (isset($productDelete)) {
                    echo $productDelete;
                  }
                 ?>
              <div class="panel-body">
                <table class="table table-striped table-hover" id="tablelist">
                      <thead>
                      <tr class="active">
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Brand</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        <th>Product image</th>
                        <th>Product Type</th>
                        <th>Product Action</th>
                      </tr>
                      </thead>
                      <tfoot>

                      </tfoot>
                      <tbody>
                      <?php $fm = new Format();
                        $getProduct = $product->getAllProduct();
                        if ($getProduct) {
                          $i = 0;
                          while ($result = $getProduct->fetch_assoc()) {
                            $i++;
                       ?>
                      <tr>
                        <td><?php echo $result['product_name']; ?></td>
                        <td><?php echo $result['cat_name']; ?></td>
                        <td><?php echo $result['brand_name']; ?></td>
                        <td><?php echo $fm->textShorten($result['body'], 50); ?></td>
                        <td><?php echo $result['price']; ?></td>
                        <td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"></td>
                        <td><?php
                        	if ($result['type'] == 0) {
                        		echo "Featured";
                        	}else {
                        		echo "None";
                        	}
                        	?>
                        </td>
                        <td><a class="btn btn-default" href="productedit.php?proid=<?php echo $result['product_id']; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sure to delete the data!')" href="?productDelete=<?php echo $result['product_id']; ?>">Delete</a></td>
                      </tr>
                      <?php
                          }
                        }
                      ?>
                      </tbody>
                    </table>
              </div>
              </div>
<script src="../js/imp/jquery-1.12.4.js"></script>
<script src="../js/imp/jquery.dataTables.min.js"></script>
<script src="../js/imp/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#tablelist').DataTable();
    } );
</script>
<?php include 'inc/footer.php';?>