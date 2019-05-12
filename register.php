<?php include 'inc/header.php'; ?>
<?php ob_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>


	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Account</a></li>
			<li><a href="#">Register</a></li>
		</ul>


		<?php
		   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
		   	$CustomerReg = $cmr->customerRegistration($_POST);
		   	
		   }
		?>


		
		<div class="row">

			<?php
    		
    			if (isset($CustomerReg)) {
    				echo $CustomerReg;
    			}

    		?>

			<div id="content" class="col-sm-12">
				<h2 class="title">Register Account</h2>
				<p>If you already have an account with us, please login at the <a href="login.php">login</a>.</p>
				<form action="#" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
					<fieldset id="account">
						<legend>Your Personal Details</legend>
						<div class="form-group required" style="display: none;">
							<label class="col-sm-2 control-label">Customer Group</label>
							<div class="col-sm-10">
								<div class="radio">
									<label>
										<input type="radio" name="customer_group_id" value="1" checked="checked"> Default
									</label>
								</div>
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-firstname">First Name</label>
							<div class="col-sm-10">
								<input type="text" name="first_name" value="" placeholder="First Name" id="input-firstname" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
							<div class="col-sm-10">
								<input type="text" name="last_name" value="" placeholder="Last Name" id="input-lastname" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-email">E-Mail</label>
							<div class="col-sm-10">
								<input type="email" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-telephone">Phone</label>
							<div class="col-sm-10">
								<input type="tel" name="phone" value="" placeholder="Phone" id="input-telephone" class="form-control">
							</div>
						</div>
						

					</fieldset>
					<fieldset id="address">
						<legend>Your Address</legend>
						
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-address-1">Address</label>
							<div class="col-sm-10">
								<input type="text" name="address" value="" placeholder="Address" id="input-address" class="form-control">
							</div>
						</div>
						
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-city">City</label>
							<div class="col-sm-10">
								<input type="text" name="city" value="" placeholder="City" id="input-city" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-postcode">Zip</label>
							<div class="col-sm-10">
								<input type="text" name="zip" value="" placeholder="zip" id="input-postcode" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-country">Country</label>
							<div class="col-sm-10">
								<select name="country_id" id="input-country" class="form-control">
									<option value=""> --- Please Select --- </option>
									<?php
					                    $getCountry = $cmr->getAllCountry();
					                        if ($getCountry) {
					                          $i=0;
					                          while ($resultCountry = $getCountry->fetch_assoc()) {
					                            $i++;
					                ?>
									<option value="<?php echo $resultCountry['country_id']; ?>"><?php echo $resultCountry['country_name']; ?></option>
									<?php } } ?>
								</select>
							</div>
						</div>
						
					</fieldset>
					<fieldset>
						<legend>Your Password</legend>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-password">Password</label>
							<div class="col-sm-10">
								<input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
							</div>
						</div>
						
					</fieldset>
					<fieldset>
						<legend>Newsletter</legend>
						<div class="form-group">
							<label class="col-sm-2 control-label">Subscribe</label>
							<div class="col-sm-10">
								<label class="radio-inline">
									<input type="radio" name="newsletter" value="1"> Yes
								</label>
								<label class="radio-inline">
									<input type="radio" name="newsletter" value="0" checked="checked"> No
								</label>
							</div>
						</div>
					</fieldset>
					<div class="buttons">
						<div class="pull-right">I have read and agree to the <a href="#" class="agree"><b>Pricing Tables</b></a>
							<input class="box-checkbox" type="checkbox" name="agree" value="1"> &nbsp;
							<input type="submit" value="Continue" name="register"  class="btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php include 'inc/footer.php'; ?>