    <!-- Modals -->
    <?php include_once '../classes/Category.php'; ?>

<?php
    $cat = new Category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitModal'])) {
        $cat_name  = $_POST['cat_name'];
        $cat_id  = $_POST['cat_id'];
        $cat_description  = $_POST['cat_description'];
        $insertCat = $cat->catInsert($cat_name, $cat_id,  $cat_description);
    }
 ?>
    <!-- Add Page -->
    <div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="catadd.php" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Category ID</label>
          <input type="text" class="form-control" name="cat_id" placeholder="Enter Category ID Must Be Integer...">
        </div>
        <div class="form-group">
          <label>Category Name</label>
          <input type="text" class="form-control" name="cat_name" placeholder="Enter Category Name...">
        </div>
        <div class="form-group">
          <label>Category Description</label>
          <textarea name="cat_description" class="editor1 form-control" placeholder=""></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submitModal" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>