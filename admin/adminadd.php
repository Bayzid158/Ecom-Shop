<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php include_once '../classes/Admin.php'; ?>
<?php
    $user = new Admin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $admin_name  = $_POST['admin_name'];
        $admin_id  = $_POST['admin_id'];
        $admin_username  = $_POST['admin_username'];
        $admin_password  = $_POST['admin_username'];
        $insertuser = $user->userInsert($admin_name, $admin_id,  $admin_username, $admin_password);
    }
 ?>
<?php 
    if (isset($insertuser)) {
            echo $insertuser;
        }
?>
<div class="col-md-9">
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Add New User</h3>
      </div>
      <div class="panel-body">
        <form action="adminadd.php" method="post">
          <div class="form-group">
            <label>User ID</label>
            <input type="text" name="admin_id" class="form-control" placeholder="Enter User ID Must Be Integer..." value="">
          </div>
          <div class="form-group">
            <label>User Name</label>
            <input type="text" name="admin_username" class="form-control" placeholder="Enter User Name..." value="">
          </div>
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="admin_name" class="form-control" placeholder="Enter Full Name..." value="">
          </div>
          <input type="submit" class="btn btn-default" value="Submit">
        </form>
      </div>
      </div>
  </div>
<?php include 'inc/footer.php';?>