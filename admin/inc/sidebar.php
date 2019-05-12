<?php include_once '../classes/Admin.php'; ?>
<?php include_once '../classes/Category.php'; ?>
<?php include_once '../classes/Product.php'; ?>
<?php include_once '../classes/Brand.php'; ?>

<?php 
    $tot_admin = new Admin();
    $getadminCount = $tot_admin->totAdmin();
    if ($getadminCount) {
      $i=0;
      while ($result = $getadminCount->fetch_assoc()) {
        $i++;
        $totalAdmin = $result['count_admin'];
      } 
    }
?>

<?php 
    $cat = new Category();
    $getCatCount = $cat->totCat();
    if ($getCatCount) {
      $i=0;
      while ($result = $getCatCount->fetch_assoc()) {
        $i++;
        $totalCategory = $result['count_cat'];
      } 
    }
?>

<?php 
    $prod = new Product();
    $getProductCount = $prod->totProduct();
    if ($getProductCount) {
      $i=0;
      while ($result = $getProductCount->fetch_assoc()) {
        $i++;
        $totalProduct = $result['count_product'];
      } 
    }
?>

<?php 
    $BRAND = new Brand();
    $getBrandCount = $BRAND->totBrand();
    if ($getBrandCount) {
      $i=0;
      while ($result = $getBrandCount->fetch_assoc()) {
        $i++;
        $totalBrand = $result['count_brand'];
      } 
    }
?>

<section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="dashboard.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="productadd.php" class="list-group-item"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Add Item <span class="badge"></span></a>
              <a href="productlist.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Item List <span class="badge"><?php echo $totalProduct; ?></span></a>
              <a href="adminadd.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Admin <span class="badge"></span></a>
              <a href="adminlist.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Admin List <span class="badge"><?php echo $totalAdmin; ?></span></a>
              <a href="catadd.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Category <span class="badge"></span></a>
              <a href="catlist.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Category List <span class="badge"><?php echo $totalCategory; ?></span></a>
              <a href="brandadd.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Brand <span class="badge"></span></a>
              <a href="brandlist.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Brand List <span class="badge"><?php echo $totalBrand; ?></span></a>
              <a href="stat.php" class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Site Statistics </a>
            </div>

            <?php
                $diskUsed = rand (10, 50);
                $diskRest = (100 - $diskUsed);
            ?>

            <div class="well">
              <h4>Disk Space Used</h4>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $diskUsed; ?>%;">
                      <?php echo $diskUsed; ?>%
              </div>
            </div>
            <h4>Bandwidth Used </h4>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $diskRest; ?>%;">
                    <?php echo $diskRest; ?>%
            </div>
          </div>
            </div>
          </div>
          