<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

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
                <h3 class="panel-title">Website Overview</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $totalAdmin; ?></h2>
                    <h4>Admins</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $totalCategory; ?></h2>
                    <h4>Categories</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?php echo $totalProduct; ?></h2>
                    <h4>Items</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> <?php echo rand(5, 1500); ?></h2>
                    <h4>Visitors</h4>
                  </div>
                </div>
              </div>
              </div>

              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Latest Users</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Admin ID</th>
                      </tr>
                      <?php 
                        $getadmin = $admin->getLimitedAdmin(3);
                        if ($getadmin) {
                          $i = 0;
                          while ($result = $getadmin->fetch_assoc()) {
                            $i++;
                       ?>
                      <tr>
                        <td><?php echo $result['admin_name']; ?></td>
                        <td><?php echo $result['admin_username']; ?></td>
                        <td><?php echo $result['admin_id']; ?></td>
                      </tr>
                      <?php
                          }
                        }
                      ?>
                    </table>
                </div>
              </div>
<?php include 'inc/footer.php';?>