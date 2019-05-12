<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>
<?php
   	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
        $getSearchProduct  = $search->SearchProducts($_POST);
    }
    else {
        $getSearchProduct  = NULL;
    }
	
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy']) && isset($_POST['product_id'])) {
        $quantity  = 1;
        $id  = $_POST['product_id'];
        $addCart = $ct->addToCart($quantity, $id);
    }
 ?>
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>
			<li><a href="searchAll.php">Search</a></li>
		</ul>
		
		<div class="row">
			<?php include 'leftsidebar.php'; ?>
			
			<!--Middle Part Start-->
			<div id="content" class="col-md-9 col-sm-8">
				<div class="products-category">
					<div class="category-derc">
						<div class="row">
							<div class="col-sm-12">
								<div class="banners">
									<div>
										<a  href="#"><img src="image/demo/shop/category/electronic-cat.png" alt="Apple Cinema 30&quot;"><br></a>
									</div>
								</div>
							
							</div>
						</div>
					</div>
					<!-- Filters -->
					<div class="product-filter filters-panel">
						<div class="row">
							<div class="col-md-2 visible-lg">
								<div class="view-mode">
									<div class="list-view">
										<button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
										<button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
									</div>
								</div>
							</div>
							<div class="short-by-show form-inline text-center col-md-10 col-sm-8 col-xs-12">
							<div class="row">
							<form action="" method="post">
								<div class="form-group short-by col-md-3">
									<label class="control-label" for="input-sort">Category:</label><br>
									<select id="input-sort" class="form-control" name="cat_id">
										<option value="0" selected="selected">Default</option>
										<?php 
					                        $getCat = $cat->getAllCat();
					                        if ($getCat) {
					                          $i = 0;
					                          while ($result = $getCat->fetch_assoc()) {
					                            $i++;
					                    ?>
										<option value="<?php echo $result['cat_id'];?>"><?php echo $result['cat_name']; ?></option>
										<?php } }?>
									</select>
								</div>
								<div class="form-group col-md-3">
									<label class="control-label" for="input-sort">Brand:</label><br>
									<select id="input-sort" class="form-control" name="brand_id">
										<option value="0" selected="selected">Default</option>
										<?php 
					                        $getBrand = $brand->getAllBrand();
					                        if ($getBrand) {
					                          $i = 0;
					                          while ($result = $getBrand->fetch_assoc()) {
					                            $i++;
					                    ?>
										<option value="<?php echo $result['brand_id'];?>"><?php echo $result['brand_name'];?></option>
										<?php } }?>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label class="control-label" for="price-max">Price:</label>
									<span id="state"> </span><br>
									<div id="priceSlider" style="padding-bottom: 10px;"></div>
									<input type="text" name="price-min" id="minValue" size="4" style="max-height: 20px; color: green;">
									<span style="color: green; font-weight: bold;"> - To - </span>
       								<input type="text" name="price-max" id="maxValue" size="4" style="max-height: 20px; color: red;">
								</div>
								</div>


								<div class="row">
								<div class="form-group col-md-3">
									<label class="control-label" for="input-sort">Sort By:</label><br>
									<select id="input-sort" class="form-control" name="sort">
										<option value="0" selected="selected">Default</option>
										<option value="ASC">Name (A - Z)</option>
										<option value="DESC">Name (Z - A)</option>
									</select>
								</div>
								<div class="form-group col-md-3"></div>
								<div class="form-group col-md-4">
									<label class="control-label" for="input-sort">Search:</label><br>
									<input class="autosearch-input form-control" type="text" value="" size="20" autocomplete="off" placeholder="Search" name="search">
									<input type="submit" style="visibility: hidden;" />
								</div>
								
							</form>
							</div>
							</div>
						</div>
					</div>
					<!-- //end Filters -->
					<!--changed listings-->
					<div class="products-list row grid">
	<?php
		if ($getSearchProduct) {
			while ($result= $getSearchProduct->fetch_assoc()) {
	?>
	<div class="product-layout col-md-4 col-sm-6 col-xs-12 ">
		<div class="product-item-container">
			<div class="left-block">
				<div class="product-image-container lazy second_img ">
					<img data-src="admin/<?php echo $result['image'];?>" src=""  alt="Apple Cinema 30&quot;" class="img-responsive" />
					<img data-src="admin/<?php echo $result['image'];?>" src=""  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />

					<!-- <img data-src="admin/<?php echo $result['image'];?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt="Apple Cinema 30&quot;" class="img-responsive" />
					<img data-src="admin/<?php echo $result['image'];?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" /> -->
				</div>
				<!--Sale Label-->
				<span class="label label-sale">Sale</span>
				<!--countdown box-->
				<!-- <div class="countdown_box">
	<div class="countdown_inner">
		<div class="title">This limited offer ends</div>
		
		<div class="defaultCountdown-30"></div>
	</div>
</div> -->
				<!--end countdown box-->
				
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
						<span class="label label-percent">-40%</span>    
					</div>
					<div class="description item-desc hidden">
						<p><?php echo $fm->validation($fm->textShorten($result['body'], 250)); ?></p>
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
	<div class="clearfix visible-xs-block"></div>
	<?php } }?>

		</div>
	</div>
	
</div>					<!--// End Changed listings-->
					<!-- Filters -->
					<!-- <div class="product-filter product-filter-bottom filters-panel" >
						<div class="row">
							<div class="col-md-2 hidden-sm hidden-xs">
							</div>
						   <div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
								<div class="form-group" style="margin: 7px 10px">Showing 1 to 9 of 10 (2 Pages)</div>
							</div>
							<div class="box-pagination col-md-3 col-sm-4 text-right"><ul class="pagination"><li class="active"><span>1</span></li><li><a href="#">2</a></li><li><a href="#">&gt;</a></li><li><a href="#">&gt;|</a></li></ul></div>
									
						 </div>
					</div> -->
					<!-- //end Filters -->
					
				</div>
				
			</div>
			
			
		</div>
		<!--Middle Part End-->
	</div>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script>
  $(document).ready(function(){
  	var getOutput = $("#state");
  	var getSlider = $("#priceSlider");

  	getSlider.slider({
  		range:true,
  		min: 10,
  		max: 100000,
  		values: [10000, 20000],
  		slide: function(even, ui){
  			getOutput.html(ui.values[0]+'-'+ui.values[1]+' Taka');
  		},
  		stop: function(even, ui){
  			$("#minValue").val(ui.values[0]);
  			$("#maxValue").val(ui.values[1]);
  		},
  	});
  	getOutput.html(' '+getSlider.slider('values',0)+' - '+getSlider.slider('values',1)+' Taka');
  	$('#minValue').val(getSlider.slider('values',0));
  	$('#maxValue').val(getSlider.slider('values',1));

  });
  </script>
	<!-- //Main Container -->
<?php ob_end_flush(); ?>	

<?php include 'inc/footer.php'; ?>