<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php include_once '../classes/Admin.php'; ?>
<?php
    if (!isset($_GET['admin_id']) || $_GET['admin_id'] == NULL) {
        echo "<script>window.location = 'adminlist.php'; </script>";
    }else {
        $admin_id = preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['admin_id']);
    }
    $admin = new Admin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $admin_id  = $_POST['admin_id'];
        $admin_name  = $_POST['admin_name'];
        $admin_username  = $_POST['admin_username'];
        $admin_password  = $_POST['admin_password'];
        $updateadmin = $admin->updateAdmin($admin_id, $admin_name, $admin_username, $admin_password);
    }
 ?>

<?php 
    $getadmin = $admin->getByadminId($admin_id);
    if ($getadmin) {
        while ($result = $getadmin->fetch_assoc()) {

 ?>
<div class="col-md-9">
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Edit <?php echo '"' . $result['admin_name'] . '"'; ?></h3>
      </div>
      <div class="panel-body">
        <form action="adminedit.php" method="post">
          <div class="form-group">
            <?php 
                if (isset($updateadmin)) {
                    echo "<center>";
                    echo $updateadmin;
                    echo "</center><br >";
                }

            ?>
            <label>Admin ID</label>
            <input type="text" name="admin_id" class="form-control" value="<?php echo $result['admin_id']; ?>">
          </div>
          <div class="form-group">
            <label>Admin Name</label>
            <input type="text" name="admin_name" class="form-control" value="<?php echo $result['admin_name']; ?>">
          </div>
          <div class="form-group">
            <label>Admin User Name</label>
            <input type="text" name="admin_username" class="form-control" value="<?php echo $result['admin_username']; ?>">
          </div>
          <div class="form-group">
            <label>Admin Password</label>
            <input type="password" name="admin_password" class="form-control" value="<?php echo $result['admin_password']; ?>">
          </div>
          <input type="submit" class="btn btn-default" value="Submit">
        </form>
        <?php } } ?>
      </div>
      </div>
  </div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>