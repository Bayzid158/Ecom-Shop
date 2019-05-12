<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/Brand.php'; ?>
<?php
    $brand = new Brand();
    if (isset($_GET['brandDelete'])) {
    	$id = $_GET['brandDelete'];
    	$brandDelete = $brand->brandDeleteById($id);
    }
?>
<div class="col-md-9">
            <!-- Brand List -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Brand List</h3>
              </div>
              <?php 
                  if (isset($brandDelete)) {
                    echo $brandDelete;
                  }
                 ?>
              <div class="panel-body">
                <table class="table table-striped table-hover" id="tablelist">
                      <thead>
                      <tr class="active">
                        <th>Brand ID</th>
                        <th>Brand Name</th>
                        <th>Brand Action</th>
                      </tr>
                      </thead>
                      <tfoot>

                      </tfoot>
                      <tbody>
                      <?php 
                        $getBrand = $brand->getAllBrand();
                        if ($getBrand) {
                          $i = 0;
                          while ($result = $getBrand->fetch_assoc()) {
                            $i++;
                       ?>
                      <tr>
                        <td><?php echo $result['brand_id']; ?></td>
                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"><?php echo $result['brand_name']; ?></span></td>
                        <td><a class="btn btn-default" href="brandedit.php?brand_id=<?php echo $result['brand_id']; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sure to delete the data!')" href="?brandDelete=<?php echo $result['brand_id']; ?>">Delete</a></td>
                      </tr>
                      <?php
                          }
                        }
                      ?>
                      </tbody>
                    </table>
              </div>
              </div>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/imp/jquery.dataTables.min.js"></script>
<script src="../js/imp/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#tablelist').DataTable();
    } );
</script>
<?php include 'inc/footer.php';?>