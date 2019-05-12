<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>

<?php
	$custLogin = Session::get("customerLogin");

	if ($custLogin == false) {
		header("location:login.php");
	}
?>


	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Shopping Cart</a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h2 class="title">Your Order Details</h2>
            <div class="table-responsive form-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">SL</td>
                    <td class="text-center">Image</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left">ID</td>
                    <td class="text-left">Quantity</td>
                    <td class="text-right">Price</td>
                  </tr>
                </thead>
                <tbody>
                 
                  	<?php

                  		$customer_id = Session::get("customerId");
						$getOrder = $ct->getOrderProduct($customer_id);

						if ($getOrder) {

							$i   = 0;
							$sum = 0;
							$qty = 0;
							while ($result = $getOrder->fetch_assoc()) {
								$i++;
					?>
					<tr>
					<td class="text-center"><?php echo $i;?></td>
                    <td class="text-center"><a href="product.php?proid=<?php echo $result['product_id'];?>"><img width="70px" src="admin/<?php echo $result['image'];?>" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" /></a></td>
                    <td class="text-left"><a href="product.php?proid=<?php echo $result['product_id'];?>"><?php echo $result['product_name']; ?></a><br />
                     </td>
                    <td class="text-left"><?php echo $result['product_id'] ;?></td>
                    <td class="text-left"><?php echo $result['quantity'] ;?></td>
                    <td class="text-left"><?php echo $result['price'] ;?></td>
					 </tr>
					<?php 
						$Total = $result['price'];
						$qty = $qty + $result['quantity'];
						$sum = $sum + $Total;
					?>
					<?php } } ?>
                
                </tbody>
              </table>
		</div>

		<?php
			$getData = $ct->checkOrderTable();
			if ($getData) {
		?>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-8">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td class="text-right">
								<strong>Sub-Total:</strong>
							</td>
							<td class="text-right"><?php echo $currencySymbol ." ". $sum; ?></td>
						</tr>
						<!-- <tr>
							<td class="text-right">
								<strong>Flat Shipping Rate:</strong>
							</td>
							<td class="text-right">$4.69</td>
						</tr>
						<tr>
							<td class="text-right">
								<strong>Eco Tax (-2.00):</strong>
							</td>
							<td class="text-right">$5.62</td>
						</tr> -->
						<tr>
							<td class="text-right">
								<strong>VAT (20%):</strong>
							</td>
							<td class="text-right"><?php echo $currencySymbol ." ". ($vat = $sum * 0.2); ?></td>
						</tr>
						<tr>
							<td class="text-right">
								<strong>Total:</strong>
							</td>
							<td class="text-right">
							<?php
								echo $currencySymbol ." ";
								$grantTotal = $sum + $vat;
								echo $grantTotal ;
							?>	
							</td>
						</tr>
					</tbody>
				</table>
				<?php }
				   else{
				   	//header("location:index.php");
				   	//echo "Cart Empty! Please shop now.";
				   }?>
			</div>
		</div>

		 <div class="buttons">
            <div class="pull-left"><a href="index.php" class="btn btn-primary">Continue Shopping</a></div>
          </div>
        </div>

        <!--Middle Part End -->
			
		</div>
	</div>
	<!-- //Main Container -->
<?php ob_end_flush(); ?>
<?php include 'inc/footer.php'; ?>