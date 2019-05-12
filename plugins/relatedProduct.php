<!-- Related Products -->
<div class="related titleLine products-list grid module ">
	<h3 class="modtitle">Related Products  </h3>
	<div class="releate-products ">
		<?php
			if ($get_pro_price<=1000) {
				$get_pro_price_start = 1;
				$get_pro_price_end   = 1000;
			}
			else {
				$get_pro_price_start = $get_pro_price-1000;
				$get_pro_price_end   = $get_pro_price+1000;
			}
			
			$getPd = $pd->RelatedProduct($get_cat_id, $get_brand_id, $get_pro_price_start, $get_pro_price_end);

			if ($getPd) {
				while ($RelResult= $getPd->fetch_assoc()) {
		?>
		<div class="product-layout">
			<div class="product-item-container">
				<div class="left-block">
					<div class="product-image-container second_img ">
						<img  src="admin/<?php echo $RelResult['image'];?>"  title="<?php echo $RelResult['product_name'];?>" class="img-responsive" />
						<img  src="admin/<?php echo $RelResult['image'];?>"  title="<?php echo $RelResult['product_name'];?>" class="img_0 img-responsive" />
					</div>
					<!--Sale Label-->
					<span class="label label-sale">Sale</span>
					<!--full quick view block-->
					<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.php?proid=<?php echo $RelResult['product_id'];?>">  Quickview</a>
					<!--end full quick view block-->
				</div>
				
				
				<div class="right-block">
					<div class="caption">
						<h4><a href="product.php?proid=<?php echo $RelResult['product_id'];?>"><?php echo $RelResult['product_name'];?></a></h4>		
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
							<span class="price-new"><?php echo $currencySymbol ." ". ($RelResult['price']-$RelResult['price']*0.15);?></span> 
							<span class="price-old"><?php echo $currencySymbol ." ". $RelResult['price'];?></span>		 
							<span class="label label-percent">15%</span>    
						</div>
						<div class="description item-desc hidden">
							<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l..</p>
						</div>
					</div>
					
					  <div class="button-group">
						<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></button>
						<button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
						<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
					  </div>
				</div><!-- right block -->

			</div>
		</div>
		<?php } }?>
	</div>
</div>

			<!-- end Related  Products-->