<?php include "header.php" ?>
		<!-- /SECTION -->
        <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<?php
                                        if (isset($_GET["keyword"])):
											$product = new Product();
                                            $keyword = $_GET["keyword"];
											$search = $product->search($keyword);
											foreach($search as $value):
											?>
											<div class="product">
												<div class="product-img">
												<img style="width: 250px; height: 250px" src='./img/<?php echo $value['image']?>'>
													<div class="product-label">
														<span class="sale">-99%</span>
														<span class="new">NEW</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">Category</p>
													<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
													<h4 class="product-price"><?php echo  number_format($value['price'] / 100 * 1) ?><del class="product-old-price"><?php echo  number_format($value['price'])?> </del></h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
														<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
														<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn" onclick="viewDetail()"><i class="fa fa-shopping-cart"></i>add to cart</button>
												</div>
											</div>
											<!-- /product -->
										<?php endforeach; endif; ?>
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<?php include "viewdetail.php"; ?>

        <?php include "footer.php" ?>