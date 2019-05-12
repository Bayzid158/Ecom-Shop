<?php include 'inc/header.php'; ?>

<?php
    if ((!isset($_GET['category_id']) || $_GET['category_id'] == NULL)  && (!isset($_GET['search']) || $_GET['search'] == NULL)) {
    	$searchPD = "";
    	$getPd = $pd->SearchAllProduct($searchPD);
    }
    
    else if (isset($_GET['category_id'])) {
    	$catId =preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['category_id']);
    	if (!isset($_GET['search']) || $_GET['search'] == NULL) {
    		$searchPD = "";
    	}else {
    		$searchPD = $_GET['search'];
    	}
    	
    	if ($catId == 0) {
        	$getPd = $pd->SearchAllProduct($searchPD);
        }else {
        	$getPd = $pd->SearchProductByCat($catId, $searchPD);
        }
    	
    }else {
    	echo "<script>window.location = '404.php'; </script>";
    }
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $quantity  = $_POST['quantity'];
        $addCart = $ct->addToCart($quantity, $id);
    }
 ?>
<div class="main-container container">
 <!-- Searched Products -->
<div class="related titleLine products-list grid module ">
	<h3 class="modtitle">Searched Products  </h3>
	<div class="releate-products ">
		<?php
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
		<?php } } 
		else {
			echo "NO Search Found !";
			}?>
	</div>
</div>

			<!-- end Searched  Products-->
			<?php include 'plugins/newProduct.php'; ?>

</div>
<?php include 'inc/footer.php'; ?>