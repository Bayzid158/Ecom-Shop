<div class="sidebar-menu col-md-3 col-sm-6 col-xs-12 ">
	<div class="responsive so-megamenu ">
		<div class="so-vertical-menu no-gutter compact-hidden">
			<nav class="navbar-default">	
				
				<div class="container-megamenu vertical  ">
					
					<div id="menuHeading">
						<div class="megamenuToogle-wrapper">
							<div class="megamenuToogle-pattern">
								<div class="container">
									<div>
										<span></span>
										<span></span>
										<span></span>
									</div>
									All Categories							
									<i class="fa pull-right arrow-circle fa-chevron-circle-up"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="navbar-header">
						<button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle fa fa-list-alt">
							
						</button>
						All Categories		
					</div>
					<div class="vertical-wrapper" >
						<span id="remove-verticalmenu" class="fa fa-times"></span>
						<div class="megamenu-pattern">
							<div class="container">
								<ul class="megamenu">
									<?php 
			                        $getCat = $cat->getAllCat();
			                        if ($getCat) {
			                          $i = 0;
			                          while ($result = $getCat->fetch_assoc()) {
			                            $i++;
			                       ?>
									<li class="item-vertical style1 with-sub-menu hover">
										<p class="close-menu"></p>
										<a href="category.php?cat_id=<?php echo $result['cat_id'];?>" class="clearfix">
											<img src="image/theme/icons/13.png" alt="icon">
											<span><?php echo $result['cat_name']; ?></span>
											<?php 
										      	$getSubCatArrow= $cat->getSubCat($result['cat_id']);

										      	if ($getSubCatArrow) {
										      		while ($resultArrow = $getSubCatArrow->fetch_assoc()) {
										      ?>
											<b class="caret"></b>
											<?php } }?>
										</a>
										<?php 
									      	$getSubCat= $cat->getSubCat($result['cat_id']);

									      	if ($getSubCat) {
									      		while ($resultSubCat = $getSubCat->fetch_assoc()) {
									      ?>
										<div class="sub-menu" data-subwidth="100" >
											<div class="content" >
												<div class="row">
													<div class="col-sm-12">
														<div class="row">
															<div class="col-md-4 static-menu">
																<div class="menu">
																	<ul>
																		<li>
																			<a href="category.php?cat_id=<?php echo $result['cat_id'];?>"  class="main-menu"><?php echo $resultSubCat['cat_name']; ?></a>
																			<ul>
																				<li><a href="category.php?cat_id=<?php echo $resultSubCat['subCatId']; ?>" ><?php echo $resultSubCat['subCatName'];?></a></li>
																			</ul>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php } } ?>
									</li>
									<?php } } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</nav>
		</div>
	</div>

</div>