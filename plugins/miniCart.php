<!-- cart -->
<?php
	if (isset($_GET['deleteProduct'])) {
		 $delId = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['deleteProduct']);
		 $delProduct = $ct->deleteProductFromCart($delId);
	}
?>
<div id="cart" class=" btn-group btn-shopping-cart">
	<a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
		<div class="shopcart">
			<span class="handle pull-left"></span>
			<span class="title">My cart</span>

			<p class="text-shopping-cart cart-total-full">
			<?php
				 $getData = $ct->checkCartTable();
				 if ($getData) {
					$sum= Session::get("sum");
					$qty= Session::get("qty");
				 	echo $qty. " item(s) - " . $currencySymbol ." ". $sum;
				 }else {
				 	echo "(Empty)";
				 }
				 ?>
			</p>
		</div>
	</a>
	<?php
		$getPd = $ct->getCartProduct();

		if ($getPd) {

			$i   = 0;
			$sum = 0;
			$qty = 0;
	?>
	<ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">
		
		<li>
			<table class="table table-striped">
				<tbody>
					<?php 
						while ($result = $getPd->fetch_assoc()) {
						$i++;
					 ?>
					<tr>
						<td class="text-center" style="width:70px">
							<a href="product.php?proid=<?php echo $result['product_id'];?>"> <img src="admin/<?php echo $result['image'];?>" style="width:70px" alt="Filet Mign" title="Filet Mign" class="preview"> </a>
						</td>
						<td class="text-left"> <a class="cart_product_name" href="product.php?proid=<?php echo $result['product_id'];?>"><?php echo $result['product_name']; ?></a> </td>
						<td class="text-center"> x<?php echo $result['quantity']; ?> </td>
						<td class="text-center">
						<?php 
	                    	echo $currencySymbol ." ";
							$Total = $result['price'] * $result['quantity'];
							echo $Total;
						?>
	
						</td>
						<td class="text-right">
							<a href="product.php?proid=<?php echo $result['product_id'];?>" class="fa fa-edit"></a>
						</td>
						<td class="text-right">
							<a onclick="return confirm('Are you sure to delete !!') " href="?deleteProduct=<?php echo $result['cart_id'] ;?>" class="fa fa-times fa-delete"></a>
						</td>
					</tr>
					<?php 
						$qty = $qty + $result['quantity'];
						$sum = $sum + $Total;
						Session::set("qty", $qty);
						Session::set("sum", $sum);
					?>
					<?php } ?>
				</tbody>
			</table>
		</li>
		<?php
			$getData = $ct->checkCartTable();
			if ($getData) {
		?>
		<li>
			<div>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td class="text-left"><strong>Sub-Total</strong>
							</td>
							<td class="text-right"><?php echo $currencySymbol ." ". $sum; ?></td>
						</tr>
						<!-- <tr>
							<td class="text-left"><strong>Eco Tax (-2.00)</strong>
							</td>
							<td class="text-right">$2.00</td>
						</tr> -->
						<tr>
							<td class="text-left"><strong>VAT (20%)</strong>
							</td>
							<td class="text-right"><?php echo $currencySymbol ." ". ($vat = $sum * 0.2); ?></td>
						</tr>
						<tr>
							<td class="text-left"><strong>Total</strong>
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
				<p class="text-right"> <a class="btn view-cart" href="cart.php"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="checkout.php"><i class="fa fa-share"></i>Checkout</a> </p>
			</div>
		</li>
		<?php } ?>
	</ul>
	<?php } ?>
</div>
<!-- //cart -->