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
											      		while ($result = $getCatImg->fetch_assoc()) {
											
											      ?>
													<div class="col-md-3 img img1">
														<a href="category.php?cat_id=<?php echo $result['cat_id'];?>"><img src="<?php echo $result['cat_img'];?>" alt="<?php echo $result['cat_name'];?>"></a>
													</div>
													<?php } } ?>
												</div>
											</div>
										</div>
										<div class="row">
											<?php 
										      	$getCatName= $cat->getTopCat();

										      	if ($getCatName) {
										      		while ($result = $getCatName->fetch_assoc()) {
										
										      ?>
											<div class="col-md-3">
												<a href="category.php?cat_id=<?php echo $result['cat_id'];?>" class="title-submenu"><?php echo $result['cat_name'];?></a>
												<div class="row">
													<div class="col-md-12 hover-menu">
														<div class="menu">
															<ul>
																<?php 
															      	$getSubCat= $cat->getSubCat($result['cat_id']);

															      	if ($getSubCat) {
															      		while ($result = $getSubCat->fetch_assoc()) {
															      ?>
																<li><a href="category.php?cat_id=<?php echo $result['cat_id'];?>"  class="main-menu"><?php echo $result['subCatName'];?></a></li>
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
							
							<!-- <li class="with-sub-menu hover">
								<p class="close-menu"></p>
								<a href="#" class="clearfix">
									<strong>Accessories</strong>
									<img class="label-hot" src="image/theme/icons/hot-icon.png" alt="icon items">
									<b class="caret"></b>
								</a>
								<div class="sub-menu" style="width: 100%; display: none;">
									<div class="content" style="display: none;">
										<div class="row">
											<div class="col-md-8">
												<div class="row">
													<div class="col-md-6 static-menu">
														<div class="menu">
															<ul>
																<li>
																	<a href="#"  class="main-menu">Automotive</a>
																	<ul>
																		<li><a href="#">Car Alarms and Security</a></li>
																		<li><a href="#" >Car Audio &amp; Speakers</a></li>
																		<li><a href="3.php#" >Gadgets &amp; Auto Parts</a></li>
																	</ul>
																</li>
																<li>
																	<a href="#"  class="main-menu">Smartphone &amp; Tablets</a>
																	<ul>
																		<li><a href="#" >Accessories for i Pad</a></li>
																		<li><a href="#" >Apparel</a></li>
																		<li><a href="#" >Accessories for iPhone</a></li>
																	</ul>
																</li>
															</ul>
														</div>
													</div>
													<div class="col-md-6 static-menu">
														<div class="menu">
															<ul>
																<li>
																	<a href="#" class="main-menu">Sports &amp; Outdoors</a>
																	<ul>
																		<li><a href="#" >Camping &amp; Hiking</a></li>
																		<li><a href="#" >Cameras &amp; Photo</a></li>
																		<li><a href="#" >Cables &amp; Connectors</a></li>
																	</ul>
																</li>
																<li>
																	<a href="#"  class="main-menu">Electronics</a>
																	<ul>
																		<li><a href="#" >Battereries &amp; Chargers</a></li>
																		<li><a href="#" >Bath &amp; Body</a></li>
																		<li><a href="#" >Outdoor &amp; Traveling</a></li>
																	</ul>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<span class="title-submenu">Bestseller</span>
												<div class="col-sm-12 list-product">
													<div class="product-thumb">
														<div class="image pull-left">
															<a href="#"><img src="image/demo/shop/product/35.jpg" width="80" alt="Filet Mign" title="Filet Mign" class="img-responsive"></a>
														</div>
														<div class="caption">
															<h4><a href="#">Filet Mign</a></h4>
															<div class="rating-box">
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															</div>
															<p class="price">$1,202.00</p>
														</div>
													</div>
												</div>
												<div class="col-sm-12 list-product">
													<div class="product-thumb">
														<div class="image pull-left">
															<a href="#"><img src="image/demo/shop/product/W1.jpg" width="80" alt="Dail Lulpa" title="Dail Lulpa" class="img-responsive"></a>
														</div>
														<div class="caption">
															<h4><a href="#">Dail Lulpa</a></h4>
															<div class="rating-box">
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															   <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
															</div>
															<p class="price">$78.00</p>
														</div>
													</div>
												</div>
												<div class="col-sm-12 list-product">
													<div class="product-thumb">
														<div class="image pull-left">
															<a href="#"><img src="image/demo/shop/product/141.jpg" width="80" alt="Canon EOS 5D" title="Canon EOS 5D" class="img-responsive"></a>
														</div>
														<div class="caption">
															<h4><a href="#">Canon EOS 5D</a></h4>
															
															<div class="rating-box">
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
															</div>
															<p class="price">
																<span class="price-new">$60.00</span>
																<span class="price-old">$145.00</span>
																
															</p>
														</div>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</li> -->
							<li class="">
								<p class="close-menu"></p>
								<a href="cart.php" class="clearfix">
									<strong>Cart</strong>
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