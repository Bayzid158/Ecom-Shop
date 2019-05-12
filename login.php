<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>

<?php
	$custLogin = Session::get("customerLogin");

	if ($custLogin == true) {
		header("location:cart.php");
	}
?>


<?php
   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])) {
		$CustomerLogin = $cmr->CustomerLogin($_POST);
			   	
	}
?>
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Account</a></li>
			<li><a href="#">Login</a></li>
		</ul>
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<div class="page-login">
					<?php
					
						if (isset($CustomerLogin)) {
							echo $CustomerLogin;
						}
					 ?>
				
					<div class="account-border">
						<div class="row">
							<div class="col-sm-6 new-customer">
								<div class="well">
									<h2><i class="fa fa-file-o" aria-hidden="true"></i> New Customer</h2>
									<p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
								</div>
								<div class="bottom-form">
									<a href="register.php" class="btn btn-default pull-right">Register</a>
								</div>
							</div>
							
							<form action="login.php" method="post" enctype="multipart/form-data">
								<div class="col-sm-6 customer-login">
									<div class="well">
										<h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Returning Customer</h2>
										<p><strong>I am a returning customer</strong></p>
										<div class="form-group">
											<label class="control-label " for="input-email">E-Mail Address</label>
											<input type="text" name="email" id="input-email" class="form-control" />
										</div>
										<div class="form-group">
											<label class="control-label " for="input-password">Password</label>
											<input type="password" name="password" id="input-password" class="form-control" />
										</div>
									</div>
									<div class="bottom-form">
										<a href="#" class="forgot">Forgotten Password</a>
										<input type="submit" name="login" value="login" class="btn btn-default pull-right" />
									</div>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- //Main Container -->
<?php ob_end_flush(); ?>

<?php include 'inc/footer.php'; ?>