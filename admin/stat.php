<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/Stat.php'; ?>
<?php
    $stat = new Stat();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
      $getStat = $stat->siteStat($_POST);
    }
    else {
      $getStat = $stat->siteAllStat();
    }
?>
<div class="col-md-9">
            <!-- Product List -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Statistics</h3>
              </div>
              
              <div class="panel-body">
                <div class="row breadcrumb">
                  <form action="" method="post">
                  <div class="col-xs-4 col-sm-4">
                    Start Date: <br><input type="date" name="startDate">
                  </div>
                  <div class="col-xs-4 col-sm-4">
                    End Date: <br><input type="date" name="endDate">
                  </div>
                    <br><input type="submit" name="submit" value="Submit">
                  </div>
                  </form>
                </div>
                <table class="table table-striped table-hover" id="tablelist">
                      <thead>
                      <tr class="active">
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Brand</th>
                        <th>Earned</th>
                        <th>Statistics Action</th>
                      </tr>
                      </thead>
                      <tfoot>

                      </tfoot>
                      <tbody>
                      <?php 
                        if ($getStat) {
                          $i = 0;
                          while ($result = $getStat->fetch_assoc()) {
                            $i++;
                       ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['product_name']; ?></td>
                        <td><?php echo $result['cat_name']; ?></td>
                        <td><?php echo $result['brand_name']; ?></td>
                        <td><?php echo $result['SUM(tbl_orders.amount)']; ?></td>
                        <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete the data!')" href="?productDelete=<?php echo $result['product_id']; ?>">Delete</a></td>
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