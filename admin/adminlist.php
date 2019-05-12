<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/Admin.php'; ?>
<?php
    $admin = new Admin();
    if (isset($_GET['adminDelete'])) {
      $id = $_GET['adminDelete'];
      $adminDelete = $admin->adminDeleteById($id);
    }
?>

<div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Admin List</h3>
              </div>
              <?php 
                  if (isset($adminDelete)) {
                    echo $adminDelete;
                  }
                 ?>
              <div class="panel-body">
                <table class="table table-striped table-hover" id="tablelist">
                      <thead>
                      <tr class="active">
                        <th>ID</th>
                        <th>Admin Name</th>
                        <th>Admin Username</th>
                        <th>Admin Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $getadmin = $admin->getAlladmin();
                        if ($getadmin) {
                          $i = 0;
                          while ($result = $getadmin->fetch_assoc()) {
                            $i++;
                       ?>
                      <tr>
                        <td><?php echo $result['admin_id']; ?></td>
                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"><?php echo $result['admin_name']; ?></span></td>
                        <td><?php echo $result['admin_username']; ?></td>
                        <td><a class="btn btn-default" href="adminedit.php?admin_id=<?php echo $result['admin_id']; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sure to delete the data!')" href="?adminDelete=<?php echo $result['admin_id']; ?>">Delete</a></td>
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