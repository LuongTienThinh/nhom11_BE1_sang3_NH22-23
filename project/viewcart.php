<?php include "header.php" ?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Your Cart</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Cart</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
                <?php
                $product = new Product;
                $products = $product->getAllProducts();
                if(isset($_SESSION['cart'])):
                ?>
                <div class="row">
                <?php foreach($_SESSION['cart'] as $key=>$value): 
			    foreach($products as $p):
				if($p['id'] == $key):
			    ?>
                    <div class="col-md-4">
                    	<img style="width: 100%; " src="./img/<?php echo $p['image'] ?>" alt="">
                    </div>
                    <div class="col-md-8">
                    	<div class="product-details">
							<h2 class="product-name"><?php echo $p['name'] ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">10 Review(s) | Add your review</a>
							</div>
							<div>
								<h3 class="product-price"><?php echo number_format(($p['price']*0.1) * $value)?><del class="product-old-price"><?php echo number_format($p['price'] * $value)?></del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p><?php echo $p['description'] ?></p>

							<div class="product-options">
								<label>
									Size
									<select class="input-select">
										<option value="0">X</option>
									</select>
								</label>
								<label>
									Color
									<select class="input-select">
										<option value="0">Red</option>
									</select>
								</label>
							</div>

							<div class="add-to-cart">
								<div class="qty-label">
									Qty
									<div class="input-number">
										<input type="number" value="<?php echo $value ?>">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
                                <a class="primary-btn cta-btn" href="delete.php?id=<?php echo $key ?>">Delete</a>
                            </div>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">Headphones</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>
						</div>
                        <div style="padding: 20px 0px;" class="delete-product"></div>
                    </div>
				<?php endif; endforeach; endforeach; ?>
				<?php endif; ?>
                </div>
                <div style="text-align: center; padding-top: 20px" class="delete-session">
        			<a class="primary-btn cta-btn" href="del.php">Xóa toàn bộ giỏ hàng</a>
    			</div>
			</div>
		</div>
<?php include "footer.php" ?>