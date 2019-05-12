<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy']) && isset($_POST['product_id'])) {
        $quantity  = 1;
        $id  = $_POST['product_id'];
        $addCart = $ct->addToCart($quantity, $id);
    }
 ?>

<div class="related titleLine products-list grid module ">
	<h3 class="modtitle">Featured Products  </h3>
		<div class="releate-products ">
		<?php 
	      	$getFpd = $pd->getFeaturedProduct();

	      	if ($getFpd) {
	      		while ($result = $getFpd->fetch_assoc()) {
				$id = $result['product_id'];
	      ?>
			<div class="ltabs-item product-layout">
				<div class="product-item-container">
					<div class="left-block">
						<div class="product-image-container second_img ">
							<img src="admin/<?php echo $result['image'];?>" height="270px" width="270px" alt="<?php echo $result['product_name'];?>" class="img-responsive" />
							<img src="admin/<?php echo $result['image'];?>" height="270px" width="270px" alt="<?php echo $result['product_name'];?>" class="img_0 img-responsive" />
						</div>
						<!--Sale Label-->
						<span class="label label-sale">-15%</span>
						<!--full quick view block-->
						<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.php?proid=<?php echo $result['product_id'];?>">  Quickview</a>
						<!--end full quick view block-->
					</div>
					<div class="right-block">
						<div class="caption">
							<h4><a href="product.php?proid=<?php echo $result['product_id'];?>"><?php echo $result['product_name'];?></a></h4>		
							<div class="ratings">
								<div class="rating-box">
									<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
									<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
								</div>
							</div>
												
							<div class="price">
								<span class="price-new"><?php echo $currencySymbol ." ". ($result['price']-$result['price']*0.15);?></span> 
								<span class="price-old"><?php echo $currencySymbol ." ". $result['price'];?></span>		 
							</div>
						</div>
						
						  <div class="button-group">
						  	<form action="" method="post">
							<button name="buy" id="addCart" class="addToCart" type="submit" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('<?php echo $result['product_id'];?>', '1', 'admin/<?php echo $result['image'];?>', '<?php echo $result['product_name'];?>');"><i class="fa fa-shopping-cart"></i> <span class="">Add to Cart</span></button>
							<button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('<?php echo $result['product_id'];?>', 'admin/<?php echo $result['image'];?>', '<?php echo $result['product_name'];?>');"><i class="fa fa-heart"></i></button>
							<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('<?php echo $result['product_id'];?>', 'admin/<?php echo $result['image'];?>', '<?php echo $result['product_name'];?>');"><i class="fa fa-exchange"></i></button>
							<input type="hidden" name="product_id" value="<?php echo $result['product_id'];?>">
							</form>
						  </div>
					</div><!-- right block -->
				</div>
			</div>
			<?php } }?>
		</div>
		
	</div>
<!--End Items-->
<script type="text/javascript">
	function showHide() {
		var hiddenField = document.getElementByClassName('wishlist');
		hiddenField.style.display = "none";
	}
</script>
<?php ob_end_flush(); ?>