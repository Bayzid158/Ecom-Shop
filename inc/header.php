<?php
    include 'lib/Session.php';
        Session::init();
    include('lib/Database.php');
	include('helpers/Format.php');
	include 'plugins/currencySymbol.php';
	
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});

	$db     = new Database();
	$fm     = new Format();
	$cat    = new Category();
	$pd     = new Product();
	$ct     = new Cart();
	$cmr    = new Customer();
	$brand  = new Brand();
	$search = new Search();

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
    
    <!-- Basic page needs
	============================================ -->
	<title>Market - Premium Multipurpose HTML5/CSS3 Theme</title>
	<meta charset="utf-8">
    <meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business" />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
   
	<!-- Mobile specific metas
	============================================ -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<!-- Favicon
	============================================ -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">
	
	<!-- Google web fonts
	============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
    <!-- Libs CSS
	============================================ -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
	<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="css/themecss/lib.css" rel="stylesheet">
	<link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	
	<!-- Theme CSS
	============================================ -->
   	<link href="css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="css/themecss/so-categories.css" rel="stylesheet">
	<link href="css/themecss/so-listing-tabs.css" rel="stylesheet">
	<link href="css/footer1.css" rel="stylesheet">
	<link href="css/header1.css" rel="stylesheet">
	<link id="color_scheme" href="css/theme.css" rel="stylesheet">
		
	<link href="css/responsive.css" rel="stylesheet">

	<link href="css/style.css" rel="stylesheet">
	
   
	
</head>

<body class="res layout-subpage">
    <div id="wrapper" class="wrapper-full ">
	<!-- Header Container  -->
	<header id="header" class=" variantleft type_1">
<!-- Header Top -->
<div class="header-top">
	<div class="container">
		<div class="row">
			<div class="header-top-left form-inline col-sm-6 col-xs-12 compact-hidden">
				<div class="form-group languages-block ">
					<!-- <form action="http://demo.smartaddons.com/templates/html/market/index.php" method="post" enctype="multipart/form-data" id="bt-language">
						<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
							<img src="image/demo/flags/gb.png" alt="English" title="English">
							<span class="">English</span>
							<span class="fa fa-angle-down"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="index.php"><img class="image_flag" src="image/demo/flags/gb.png" alt="English" title="English" /> English </a></li>
							<li> <a href="index.php"> <img class="image_flag" src="image/demo/flags/lb.png" alt="Arabic" title="Arabic" /> Arabic </a> </li>
						</ul>
					</form>
				</div>

				<div class="form-group currencies-block">
					<form action="http://demo.smartaddons.com/templates/html/market/index.php" method="post" enctype="multipart/form-data" id="currency">
						<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
							<span class="icon icon-credit "></span> US Dollar <span class="fa fa-angle-down"></span>
						</a>
						<ul class="dropdown-menu btn-xs">
							<li> <a href="#">(€)&nbsp;Euro</a></li>
							<li> <a href="#">(£)&nbsp;Pounds	</a></li>
							<li> <a href="#">($)&nbsp;US Dollar	</a></li>
						</ul>
					</form> -->
				</div>
			</div>
<?php
	if (isset($_GET['cmrId'])) {
		$delData = $ct->delCustomerCart();
		Session::destroy();
	}
?>
			<div class="header-top-right collapsed-block text-right  col-sm-6 col-xs-12 compact-hidden">
				<h5 class="tabBlockTitle visible-xs">More<a class="expander " href="#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>
				<div class="tabBlock" id="TabBlock-1">
					<ul class="top-link list-inline">
						<li class="account" id="my_account">
							<a href="#" title="My Account" class="btn btn-xs dropdown-toggle" data-toggle="dropdown"> <span >My Account</span> <span class="fa fa-angle-down"></span></a>
							<ul class="dropdown-menu">
								<?php
									$custLogin = Session::get("customerLogin");

									if ($custLogin == false) { ?>
								<li><a href="register.php"><i class="fa fa-user"></i> Register</a></li>
								<li><a href="login.php"><i class="fa fa-pencil-square-o"></i> Login</a></li>
								<?php } else{ ?>
								<li><a href="?cmrId=<?php Session::get('customerId');?>"><i class="fa fa-pencil-square-o"></i> Logout</a></li>
								<?php } ?>
							</ul>

						</li>
						<li class="wishlist"><a href="wishlist.php" id="wishlist-total" class="top-link-wishlist" title="Wish List (2)"><span>Wish List (2)</span></a></li>
						<li class="checkout"><a href="checkout.php" class="top-link-checkout" title="Checkout"><span >Checkout</span></a></li>
						<li class="login"><a href="cart.php" title="Shopping Cart"><span >Shopping Cart</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //Header Top -->

<!-- Header center -->
<div class="header-center left">
	<div class="container">
		<div class="row">
			<!-- Logo -->
			<div class="navbar-logo col-md-3 col-sm-12 col-xs-12">
				<a href="index.php"><img src="image/demo/logos/theme_logo.png" title="Your Store" alt="Your Store" /></a>
			</div>
			<!-- //end Logo -->

			<!-- Search -->
			<div id="sosearchpro" class="col-sm-7 search-pro">
				<form method="" action="search.php">
					<div id="search0" class="search input-group">
						<div class="select_category filter_type icon-select">
							<select class="no-border" name="category_id">
								<option value="0">All Categories</option>
								<?php 
			                        $getCatSearch = $cat->getAllCat();
			                        if ($getCatSearch) {
			                          $i = 0;
			                          while ($resultHeader = $getCatSearch->fetch_assoc()) {
			                            $i++;
			                       ?>
								<option value="<?php echo $resultHeader['cat_id']; ?>"><?php echo $resultHeader['cat_name']; ?></option>
								<?php } } ?>
							</select>
						</div>

						<input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search">
						<span class="input-group-btn">
						<!-- <button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button> -->
						</span>
					</div>
					<!-- <input type="hidden" name="route" value="product/search" /> -->
				</form>
			</div>
			<!-- //end Search -->

			<!-- Secondary menu -->
			<div class="col-md-2 col-sm-5 col-xs-12 shopping_cart pull-right">
				<?php include 'plugins/miniCart.php'; ?>
			</div>
		</div>

	</div>
</div>
<!-- //Header center -->

<!-- Header Bottom -->
<div class="header-bottom">
	<div class="container">
		<div class="row">
			<?php include 'inc/AllCategories.php'; ?>
			
			<!-- Main menu -->
			<div class="megamenu-hori header-bottom-right  col-md-9 col-sm-6 col-xs-12 ">
				<div class="responsive so-megamenu ">
	<nav class="navbar-default">
		<div class=" container-megamenu  horizontal">
			
			<div class="navbar-header">
				<button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				Navigation		
			</div>
			
			<div class="megamenu-wrapper">
				<span id="remove-megamenu" class="fa fa-times"></span>
				<div class="megamenu-pattern">
					<div class="container">
						<ul class="megamenu " data-transition="slide" data-animationtime="250">
							<li class="">
								<p class="close-menu"></p>
								<a href="index.php" class="clearfix">
									<strong>Home</strong>
									<span class="label"></span>
								</a>
							</li>
							<li class="with-sub-menu hover">
								<p class="close-menu"></p>
								<a href="#" class="clearfix">
									<strong>Top Categories</strong>
									<span class="label"></span>
									<b class="caret"></b>
								</a>
								<div class="sub-menu" style="width: 100%; display: none;">
									<div class="content">
										<div id="catImg" class="row">
											<div class="col-sm-12">
												<div class="row">
													<?php 
											      	$getCatImg= $cat->getTopCat();

											      	if ($getCatImg) {
											      		while ($resultHeader = $getCatImg->fetch_assoc()) {
											
											      ?>
													<div class="col-md-3 img img1">
														<a href="category.php?cat_id=<?php echo $resultHeader['cat_id'];?>"><img src="<?php echo $resultHeader['cat_img'];?>" alt="<?php echo $resultHeader['cat_name'];?>"></a>
													</div>
													<?php } } ?>
												</div>
											</div>
										</div>
										<div class="row">
											<?php 
										      	$getCatName= $cat->getTopCat();

										      	if ($getCatName) {
										      		while ($resultHeader = $getCatName->fetch_assoc()) {
										
										      ?>
											<div class="col-md-3">
												<a href="category.php?cat_id=<?php echo $resultHeader['cat_id'];?>" class="title-submenu"><?php echo $resultHeader['cat_name'];?></a>
												<div class="row">
													<div class="col-md-12 hover-menu">
														<div class="menu">
															<ul>
																<?php 
															      	$getSubCat= $cat->getSubCat($resultHeader['cat_id']);

															      	if ($getSubCat) {
															      		while ($resultHeader = $getSubCat->fetch_assoc()) {
															      ?>
																<li><a href="category.php?cat_id=<?php echo $resultHeader['cat_id'];?>"  class="main-menu"><?php echo $resultHeader['subCatName'];?></a></li>
																<?php } } ?>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<?php } } ?>
										</div>
									</div>
								</div>
							</li>
							<?php
								$chkCart = $ct->checkCartTable();
								if ($chkCart) { ?>
									<li class="">
										<p class="close-menu"></p>
										<a href="cart.php" class="clearfix">
											<strong>Cart</strong>
											<span class="label"></span>
										</a>
									</li>
							<?php } ?>

							

							<?php

								$login = Session::get("customerLogin");
								if ($login == true) { ?>

									<li class="">
										<p class="close-menu"></p>
										<a href="profile.php" class="clearfix">
											<strong>Profile</strong>
											<span class="label"></span>
										</a>
									</li>
									
							<?php } ?>
							<li class="">
								<p class="close-menu"></p>
								<a href="searchAll.php" class="clearfix">
									<strong>Search</strong>
									<span class="label"></span>
								</a>
							</li>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</nav>
</div>
									</div>
			<!-- //end Main menu -->
			
		</div>
	</div>

</div>

<!-- Navbar switcher -->
<!-- //end Navbar switcher -->
	</header>
	<!-- //Header Container  -->