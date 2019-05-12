<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/Category.php'; ?>
<?php
    $cat = new Category();
    if (isset($_GET['catDelete'])) {
      $id = $_GET['catDelete'];
      $catDelete = $cat->catDeleteById($id);
    }
?>

<div class="col-md-9">
            <!-- Category List -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Category List</h3>
              </div>
              <?php 
                  if (isset($catDelete)) {
                    echo $catDelete;
                  }
                 ?>
              <div class="panel-body">
                <table class="table table-striped table-hover" id="tablelist">
                      <thead>
                      <tr class="active">
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Category Short Description</th>
                        <th>Category Action</th>
                      </tr>
                      </thead>
                      <tfoot>

                      </tfoot>
                      <tbody>
                      <?php 
                        $getCat = $cat->getAllCat();
                        if ($getCat) {
                          $i = 0;
                          while ($result = $getCat->fetch_assoc()) {
                            $i++;
                       ?>
                      <tr>
                        <td><?php echo $result['cat_id']; ?></td>
                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"><?php echo $result['cat_name']; ?></span></td>
                        <td><?php echo $fm->textShorten($result['cat_description'], 50); ?></td>
                        <td><a class="btn btn-default" href="catedit.php?cat_id=<?php echo $result['cat_id']; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sure to delete the data!')" href="?catDelete=<?php echo $result['cat_id']; ?>">Delete</a></td>
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