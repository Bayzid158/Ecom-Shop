<?php include 'inc/header.php'; ?>
<?php ob_start(); ?>
<?php
    if (!isset($_GET['cat_id']) || $_GET['cat_id'] == NULL) {
        echo "<script>window.location = '404.php'; </script>";
    }else {
        $id = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['cat_id']);
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
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>
			<?php 
				$getct = $cat->getByCatId($id);

				if ($getct) {
					while ($result= $getct->fetch_assoc()) {
						$get_cat_id = $result['cat_id'];
			?>
			<li><a href="category.php?cat_id=<?php echo $result['cat_id'];?>"><?php echo $result['cat_name'];?></a></li>
			<?php } } ?>
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
							<div class="short-by-show form-inline text-right col-md-7 col-sm-8 col-xs-12">
								<div class="form-group short-by">
									<label class="control-label" for="input-sort">Sort By:</label>
									<select id="input-sort" class="form-control"
									onchange="location = this.value;">
										<option value="" selected="selected">Default</option>
										<option value="">Name (A - Z)</option>
										<option value="">Name (Z - A)</option>
										<option value="">Price (Low &gt; High)</option>
										<option value="">Price (High &gt; Low)</option>
										<option value="">Rating (Highest)</option>
										<option value="">Rating (Lowest)</option>
										<option value="">Model (A - Z)</option>
										<option value="">Model (Z - A)</option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="input-limit">Show:</label>
									<select id="input-limit" class="form-control" onchange="location = this.value;">
										<option value="" selected="selected">9</option>
										<option value="">25</option>
										<option value="">50</option>
										<option value="">75</option>
										<option value="">100</option>
									</select>
								</div>
							</div>
							<!-- <div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">
								<ul class="pagination">
									<li class="active"><span>1</span></li>
									<li><a href="#">2</a></li><li><a href="#">&gt;</a></li>
									<li><a href="#">&gt;|</a></li>
								</ul>
							</div> -->
						</div>
					</div>
					<!-- //end Filters -->
					<!--changed listings-->
					<div class="products-list row grid">
	<?php
		$getNewPd = $pd->ProductByCat($id);
		if ($getNewPd) {
			while ($newResult= $getNewPd->fetch_assoc()) {
	?>
	<div class="product-layout col-md-4 col-sm-6 col-xs-12 ">
		<div class="product-item-container">
			<div class="left-block">
				<div class="product-image-container lazy second_img ">
					<img data-src="admin/<?php echo $newResult['image'];?>" src=""  alt="Apple Cinema 30&quot;" class="img-responsive" />
					<img data-src="admin/<?php echo $newResult['image'];?>" src=""  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />

					<!-- <img data-src="admin/<?php echo $newResult['image'];?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt="Apple Cinema 30&quot;" class="img-responsive" />
					<img data-src="admin/<?php echo $newResult['image'];?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" /> -->
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
				<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.php?proid=<?php echo $newResult['product_id'];?>">  Quickview</a>
				<!--end full quick view block-->
			</div>
			
			
			<div class="right-block">
				<div class="caption">
					<h4><a href="product.php?proid=<?php echo $newResult['product_id'];?>"><?php echo $newResult['product_name'];?></a></h4>		
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
						<span class="price-new"><?php echo $currencySymbol ." ". ($newResult['price']-$newResult['price']*0.15);?></span> 
						<span class="price-old"><?php echo $currencySymbol ." ". $newResult['price'];?></span>		 
						<span class="label label-percent">-40%</span>    
					</div>
					<div class="description item-desc hidden">
						<p><?php echo $fm->validation($fm->textShorten($newResult['body'], 250)); ?></p>
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
	<!-- //Main Container -->
<?php ob_end_flush(); ?>	

<?php include 'inc/footer.php'; ?>