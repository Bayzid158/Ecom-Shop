<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>

<?php

	if (isset($_GET['deleteProduct'])) {
		 $delId = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['deleteProduct']);
		 $delProduct = $ct->deleteProductFromCart($delId);
	}

?>

<?php

	if (isset($_GET['order_id']) && $_GET['order_id'] ='order') {
		$customer_id = Session::get("customerId");
		$insertOrder = $ct->insertOrderProduct($customer_id);
		$delData = $ct->delCustomerCart();
	}

?>

<?php 
	   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	   	$cart_id  = $_POST['cart_id'];
        $quantity  = $_POST['quantity'];
        $updateCart = $ct->updateCartQuantity($cart_id, $quantity);
        if($quantity<=0){
            $delProduct = $ct->deleteProductFromCart($cart_id);
        }
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
          <h2 class="title">Shopping Cart</h2>
          <?php
			    		if (isset($updateCart)) {
			    			echo $updateCart;
			    		}

			    		if (isset($delProduct)) {
			    			echo $delProduct;
			    		}

			    	?>
            <div class="table-responsive form-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">SL</td>
                    <td class="text-center">Image</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left">ID</td>
                    <td class="text-left">Quantity</td>
                    <td class="text-right">Unit Price</td>
                    <td class="text-right">Total</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  	<?php
						$getPd = $ct->getCartProduct();

						if ($getPd) {

							$i   = 0;
							$sum = 0;
							$qty = 0;
							while ($result = $getPd->fetch_assoc()) {
								$i++;
					?>
					<td class="text-center"><?php echo $i;?></td>
                    <td class="text-center"><a href="product.php?proid=<?php echo $result['product_id'];?>"><img width="70px" src="admin/<?php echo $result['image'];?>" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" /></a></td>
                    <td class="text-left"><a href="product.php?proid=<?php echo $result['product_id'];?>"><?php echo $result['product_name']; ?></a><br />
                     </td>
                    <td class="text-left"><?php echo $result['product_id'] ;?></td>
                    <td class="text-left" width="200px"><form action="" method="post" class="input-group btn-block quantity">
                    	
                    	<input type="hidden" name="cart_id" value="<?php echo $result['cart_id'] ;?>"/>

                        <input type="text" name="quantity" value="<?php echo $result['quantity'] ;?>" size="1" class="form-control" />
                        <span class="input-group-btn">
                        <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-clone"></i></button>
                        <div data-toggle="tooltip"  class="btn btn-danger"><a onclick="return confirm('Are you sure to delete !!') " href="?deleteProduct=<?php echo $result['cart_id'] ;?>"><i class="fa fa-times-circle"></i></a></div>
                        </span>
                        </form>
                    </td>
                    <td class="text-right"><?php echo $currencySymbol ." ". $result['price']; ?></td>
                    <td class="text-right">
                    <?php 
                    	echo $currencySymbol ." ";
						$Total = $result['price'] * $result['quantity'];
						echo $Total;

					?>
					</td>
                  </tr>
                  <?php 
						$qty = $qty + $result['quantity'];
						$sum = $sum + $Total;
						Session::set("qty", $qty);
						Session::set("sum", $sum);
					?>
                  <?php } }
                  else {
                  	echo "<script>window.location = 'index.php'; </script>";
                  	}?>
                </tbody>
              </table>
            </div>
          
		<?php
			$getData = $ct->checkCartTable();
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
            <?php 
            	$custLogin = Session::get("customerLogin");

				if ($custLogin == false) { ?>
					<div class="pull-right"><a href="login.php" class="btn btn-primary">Checkout</a></div>
			<?php }
            	else { ?>
            		<div class="pull-right"><a href="?order_id=order" class="btn btn-primary">Checkout</a></div>
            <?php } ?>
          </div>
        </div>
        <!--Middle Part End -->
			
		</div>
	</div>
	<!-- //Main Container -->
<?php ob_end_flush(); ?>	

<?php include 'inc/footer.php'; ?>