<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>
	
	<?php include 'inc/Carousel.php'; ?>
	<br>
	<!-- Main Container  -->
	<div class="main-container container">
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<?php include 'plugins/featuredProduct.php'; ?>		

				<?php //include 'plugins/banners.php'; ?>
				
				<?php include 'plugins/newProduct.php'; ?>
						<!--End Items-->
	
				<!-- <div class="module no-margin titleLine ">
					<h3 class="modtitle">COLLECTIONS</h3>
					<div class="modcontent clearfix">
						<div id="collections_block" class="clearfix  block">
							<ul class="width6">
								<li class="collect collection_0">
									<div class="color_co"><a href="#">Furniture</a> </div>
								</li>
								<li class="collect collection_1">
									<div class="color_co"><a href="#">Gift idea</a> </div>
								</li>
								<li class="collect collection_2">
									<div class="color_co"><a href="#">Cool gadgets</a> </div>
								</li>
								<li class="collect collection_3">
									<div class="color_co"><a href="#">Outdoor activities</a> </div>
								</li>
								<li class="collect collection_4">
									<div class="color_co"><a href="#">Accessories for</a> </div>
								</li>
								<li class="collect collection_5">
									<div class="color_co"><a href="#">Menz world</a> </div>
								</li>
							</ul>
						</div>
					</div>
				</div> -->
				
			</div>
		</div>
	</div>
	<!-- //Main Container -->
	<?php //include 'plugins/hotCategories.php'; ?>

<?php include 'inc/footer.php'; ?>