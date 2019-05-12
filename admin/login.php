<?php include '../classes/AdminLogin.php'; ?>
<?php
  $admin_login = new AdminLogin();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $loginCheck = $admin_login->adminLogin($admin_username, $admin_password);
  }

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type="image/png" href="../favicon/admin favicon.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Account Login</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
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
          <a class="navbar-brand" href="/shop" target="_blank">Online SHOP</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Admin Area <small>Account Login</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
      
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <span style="vertical-align: center; color: red; font-size: 18px;">
                <?php
                  if (isset($loginCheck)) {
                    echo $loginCheck;
                  }
                 ?>
            </span>
            <form id="login" action="login.php" method="post" class="well">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Enter Username" name="admin_username">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="admin_password">
                  </div>
                  <button type="submit" class="btn btn-default btn-block">Login</button>
              </form>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright <a href="/shop" target="_blank"> Online SHOP</a>, &copy; 2017</p>
    </footer>

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
