			<!--Left Part Start -->
			<aside class="col-sm-4 col-md-3" id="column-left">
				<div class="module menu-category titleLine">
	<h3 class="modtitle">Categories</h3>
	<div class="modcontent">
		<div class="box-category">
			<ul id="cat_accordion" class="list-group">
				<?php 
	                $getCat = $cat->getAllCat();
	                if ($getCat) {
	                  $i = 0;
	                  while ($result = $getCat->fetch_assoc()) {
	                    $i++;
	               ?>
				<li class="hadchild"><a href="category.php?cat_id=<?php echo $result['cat_id'];?>" class="cutom-parent"><?php echo $result['cat_name']; ?></a>

					
						<?php 
					      	$getSubCat= $cat->getSubCat($result['cat_id']);
					      	if ($getSubCat) {
					      		echo '<span class="button-view  fa fa-plus-square-o"></span>';
					      	}
					      	echo '<ul style="display: block;">';
					      	if ($getSubCat) { 
					      		while ($resultSubCat = $getSubCat->fetch_assoc()) {
					      ?>
						<li><a href="subcategory.php?subcat_id=<?php echo $resultSubCat['subCatId'];?>"><?php echo $resultSubCat['subCatName']; ?></a></li>
						<?php } }?>
					</ul>
				</li>
				<?php } }?>
			</ul>
		</div>
		
		
	</div>
</div>
				<div class="module latest-product titleLine">
   <h3 class="modtitle">Latest Product</h3>
   <div class="modcontent ">
   		<?php
			$getNewPd = $pd->getNewProduct();
			if ($getNewPd) {
				while ($newResult= $getNewPd->fetch_assoc()) {
		?>
		<div class="product-latest-item">
			<div class="media">
			   <div class="media-left">
				  <a href="#"><img src="admin/<?php echo $newResult['image'];?>" alt="<?php echo $newResult['product_name'];?>" title="<?php echo $newResult['product_name'];?>" class="img-responsive" style="width: 100px; height: 82px;"></a>
			   </div>
			   <div class="media-body">
				  <div class="caption">
					 <h4><a href="product.php?proid=<?php echo $newResult['product_id'];?>"><?php echo $newResult['product_name'];?></a></h4>
					
					 <div class="price">
						<span class="price-new"><?php echo $currencySymbol ." ". ($newResult['price']-$newResult['price']*0.15);?></span>
					 </div>
					 <div class="ratings">
						<div class="rating-box">
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						</div>
					 </div>
				  </div>
				  
			   </div>
			</div>
		</div>
		<?php } }?>
		
   </div>
   
</div>
				<div class="module">
					<div class="modcontent clearfix">
						<div class="banners">
							<div>
								<a href="#"><img src="image/demo/cms/left-image-static.png" alt="left-image"></a>
							</div>
						</div>
						
					</div>
				</div>
			</aside>
			<!--Left Part End -->