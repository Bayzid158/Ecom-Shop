<?php
    include_once '../lib/Session.php';
        Session::checkSession();
    include_once '../helpers/Format.php';
    $fm = new Format();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type="image/png" href="../favicon/admin favicon.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="../favicon/favicon.png"/>
        <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script src="js/ckeditor.js" type="text/javascript"></script>
    <script src="js/table/table.js" type="text/javascript"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
        setSidebarHeight();
        });
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/dropdown.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    




  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php">Online SHOP</a>
        </div>
        <?php 
	        if (isset($_GET['action']) && $_GET['action'] == "logout") {
	            Session::destroy();
	        }
	     ?>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="dashboard.php">Dashboard</a></li>
            <li><a href="catlist.php">Categories</a></li>
            <li><a href="orderlist.php">Orders</a></li>
            <li><a href="adminlist.php">Users</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, <?php echo Session::get('admin_name'); ?></a></li>
            <li><a href="?action=logout">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small> | Administrator</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addCat">Add Category</a></li>
                <li><a href="#">Add Brand</a></li>
                <li><a href="#">Add User</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>