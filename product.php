<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>

<?php
    if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
        echo "<script>window.location = '404.php'; </script>";
    }else {
        $id = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['proid']);
    }
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy'])) {
    	$crt = new Cart();
        $quantity  = $_POST['quantity'];
        $addCart = $crt->addToCart($quantity, $id);
    }
 ?>


	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
		<?php 
			$getPd = $pd->getSingleProduct($id);

			if ($getPd) {
				while ($result= $getPd->fetch_assoc()) {
					$get_cat_id    = $result['cat_id'];
					$get_brand_id  = $result['brand_id'];
					$get_pro_price = $result['price'];
		?>
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#"><?php echo $result['cat_name'];?></a></li>
			<li><a href="#"><?php echo $result['product_name'];?></a></li>
			
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-md-12 col-sm-12">
				
				<div class="product-view row">
					<div class="left-content-product col-lg-10 col-xs-12">
						<div class="row">
							<div class="content-product-left class-honizol col-sm-6 col-xs-12 ">
								<div class="large-image  ">
									<img itemprop="image" class="product-image-zoom" src="admin/<?php echo $result['image'];?>" data-zoom-image="admin/<?php echo $result['image'];?>" title="<?php echo $result['product_name'];?>" alt="<?php echo $result['product_name'];?>">
								</div>
								<!-- <a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i class="fa fa-youtube-play"></i></a> -->
								<div id="thumb-slider" class="owl-theme owl-loaded owl-drag full_slider">
									<a data-index="0" class="img thumbnail " data-image="admin/<?php echo $result['image'];?>" title="<?php echo $result['product_name'];?>">
										<img src="admin/<?php echo $result['image'];?>" title="<?php echo $result['product_name'];?>" alt="<?php echo $result['product_name'];?>">
									</a>
									<a data-index="1" class="img thumbnail " data-image="admin/<?php echo $result['image'];?>" title="<?php echo $result['product_name'];?>">
										<img src="admin/<?php echo $result['image'];?>" title="<?php echo $result['product_name'];?>" alt="<?php echo $result['product_name'];?>">
									</a>
									<a data-index="2" class="img thumbnail " data-image="admin/<?php echo $result['image'];?>" title="<?php echo $result['product_name'];?>">
										<img src="admin/<?php echo $result['image'];?>" title="<?php echo $result['product_name'];?>" alt="<?php echo $result['product_name'];?>">
									</a>
									<a data-index="3" class="img thumbnail " data-image="admin/<?php echo $result['image'];?>" title="<?php echo $result['product_name'];?>">
										<img src="admin/<?php echo $result['image'];?>" title="<?php echo $result['product_name'];?>" alt="<?php echo $result['product_name'];?>">
									</a>
								</div>
								
							</div>

							<div class="content-product-right col-sm-6 col-xs-12">
								<div class="title-product">
									<h1><?php echo $result['product_name'];?></h1>
								</div>
								<!-- Review ---->
								<!-- <div class="box-review form-group">
									<div class="ratings">
										<div class="rating-box">
											<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
											<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
											<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
											<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
											<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
										</div>
									</div>

									<a class="reviews_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews</a>	| 
									<a class="write_review_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
								</div> -->

								<div class="product-label form-group">
									<div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
										<span class="price-new" itemprop="price"><?php echo $currencySymbol ." ". ($result['price']-$result['price']*0.15);?></span>
										<span class="price-old"><?php echo $currencySymbol ." ". ($result['price']);?></span>
									</div>
									<div class="stock"><span>Availability:</span> <span class="status-stock">In Stock</span></div>
								</div>

								<div class="product-box-desc">
									<div class="inner-box-desc">
										<div class="price-tax"><span>Ex Tax (5%)  : </span><?php echo $currencySymbol ." ". ($result['price']*0.05); ?></div>
										<div class="reward">   <span>Price in reward points: </span> <?php echo rand(20,500); ?></div>
										<div class="brand">    <span>Brand        : </span><a href="#"> <?php echo $result['brand_name'];?></a></div>
										<div class="model">    <span>Product Code : </span> <?php echo $result['product_id'];?></div>
										<div class="reward">   <span>Reward Points: </span> 100</div>
									</div>
								</div>


								<div id="product">
									<!-- <h4>Available Options</h4>
									<div class="image_option_type form-group required">
										<label class="control-label">Colors</label>
										<ul class="product-options clearfix"id="input-option231">
											<li class="radio">
												<label>
													<input class="image_radio" type="radio" name="option[231]" value="33"> 
													<img src="image/demo/colors/blue.jpg" data-original-title="blue +$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
													<label> </label>
												</label>
											</li>
											<li class="radio">
												<label>
													<input class="image_radio" type="radio" name="option[231]" value="34"> 
													<img src="image/demo/colors/brown.jpg" data-original-title="brown -$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
													<label> </label>
												</label>
											</li>
											<li class="radio">
												<label>
													<input class="image_radio" type="radio" name="option[231]" value="35"> <img src="image/demo/colors/green.jpg"
													data-original-title="green +$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
													<label> </label>
												</label>
											</li>
											<li class="selected-option">
											</li>
										</ul>
									</div> -->
									
									<!-- <div class="box-checkbox form-group required">
										<label class="control-label">Checkbox</label>
										<div id="input-option232">
											<div class="checkbox">
												<label for="checkbox_1"><input type="checkbox" name="option[232][]" value="36" id="checkbox_1"> Checkbox 1 (+$12.00)</label>
											</div>
											<div class="checkbox">
												<label for="checkbox_2"><input type="checkbox" name="option[232][]" value="36" id="checkbox_2"> Checkbox 2 (+$36.00)</label>
											</div>
											<div class="checkbox">
												<label for="checkbox_3"><input type="checkbox" name="option[232][]" value="36" id="checkbox_3"> Checkbox 3 (+$24.00)</label>
											</div>
											<div class="checkbox">
												<label for="checkbox_4"><input type="checkbox" name="option[232][]" value="36" id="checkbox_4"> Checkbox 4 (+$48.00)</label>
											</div>
										</div>
									</div> -->

									<div class="form-group box-info-product">
										<div class="option quantity">
											<div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
												<label>Qty</label>
												<form action="" method="post">
												<input type="hidden" name="product_id" value="<?php echo $result['product_id'];?>">
												<input class="form-control" type="text" name="quantity" value="1">
												<span class="input-group-addon product_quantity_down">−</span>
												<span class="input-group-addon product_quantity_up">+</span>
											</div>
										</div>
										<div class="cart">
											<input type="submit" name="buy" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" onclick="cart.add('42', '1');" data-original-title="Add to Cart">
											</form>
										</div>
										<div class="add-to-links wish_comp">
											<ul class="blank list-inline">
												<li class="wishlist">
													<a class="icon" data-toggle="tooltip" title=""
													onclick="wishlist.add('50');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
													</a>
												</li>
												<li class="compare">
													<a class="icon" data-toggle="tooltip" title=""
													onclick="compare.add('50');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
													</a>
												</li>
											</ul>
										</div>

									</div>

								</div>
								<!-- end box info product -->

							</div>
						</div>
					</div>
					
					<section class="col-lg-2 hidden-sm hidden-md hidden-xs slider-products">
						<div class="module col-sm-12 four-block">
							<div class="modcontent clearfix">
								<div class="policy-detail">
									<div class="banner-policy">
										<div class="policy policy1">
											<a href="#"> <span class="ico-policy">&nbsp;</span>	90 day
											<br> money back </a>
										</div>
										<div class="policy policy2">
											<a href="#"> <span class="ico-policy">&nbsp;</span>	In-store exchange </a>
										</div>
										<div class="policy policy3">
											<a href="#"> <span class="ico-policy">&nbsp;</span>	lowest price guarantee </a>
										</div>
										<div class="policy policy4">
											<a href="#"> <span class="ico-policy">&nbsp;</span>	shopping guarantee </a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				
				<!-- Product Tabs -->
				<div class="producttab ">
	<div class="tabsslider  vertical-tabs col-xs-12">
		<ul class="nav nav-tabs col-lg-2 col-sm-3">
			<li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
			
		</ul>
		<div class="tab-content col-lg-10 col-sm-9 col-xs-12">
			<div id="tab-1" class="tab-pane fade active in">
				<?php echo $result['body'];?>

				
			</div>
		<?php } }?>	
		</div>
	</div>
</div>
<?php ob_end_flush(); ?>
				<!-- //Product Tabs -->
				
				<?php include 'plugins/relatedProduct.php'; ?>
			
				
			</div>
			
			
		</div>
		<!--Middle Part End-->
	</div>
	<!-- //Main Container -->
	

<?php include 'inc/footer.php'; ?>