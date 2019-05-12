<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/Orders.php'; ?>
<?php
    $order = new Orders();
    if (isset($_GET['orderDelete'])) {
    	$id = $_GET['orderDelete'];
    	$orderDelete = $order->orderDeleteById($id);
    }
?>
<div class="col-md-9">
            <!-- Product List -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Product List</h3>
              </div>
              <?php 
                  if (isset($orderDelete)) {
                    echo $orderDelete;
                  }
                 ?>
              <div class="panel-body">
                <table class="table table-striped table-hover" id="tablelist">
                      <thead>
                      <tr class="active">
                        <th>SL</th>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product ID</th>
                        <th>Amount</th>
                        <th>Order Date</th>
                        <th>Order Action</th>
                      </tr>
                      </thead>
                      <tfoot>

                      </tfoot>
                      <tbody>
                      <?php 
                        $getOrders = $order->getAllOrders();
                        if ($getOrders) {
                          $i = 0;
                          while ($result = $getOrders->fetch_assoc()) {
                            $i++;
                       ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['order_id']; ?></td>
                        <td><?php echo $result['product_name']; ?></td>
                        <td><?php echo $result['cat_name']; ?></td>
                        <td><?php echo $result['product_id']; ?></td>
                        <td><?php echo $result['amount']; ?></td>
                        <td><?php echo $result['order_date']; ?></td>
                        <td><a class="btn btn-default" href="orderedit.php?orderid=<?php echo $result['order_id']; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sure to delete the data!')" href="?orderDelete=<?php echo $result['order_id']; ?>">Delete</a></td>
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