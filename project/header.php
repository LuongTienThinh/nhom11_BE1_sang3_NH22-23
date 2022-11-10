<?php session_start();
require "./config.php";
require "./models/Db.php";
require "./models/products.php";
require "./models/manufactures.php";
require "./models/protypes.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +(84)987654321</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> nhom11@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Viet Nam</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
						<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->
						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="get" action="result.php">
									<select class="input-select">
										<option value="0">All Categories</option>
		                                <?php 
		                                $protype = new Protype();
		                                $arrProtype = $protype->getAllProtypes();
		                                $i = 1;
		                                foreach ($arrProtype as $value) {
		                                    ?>
		                                    <option value="<?php echo $i; ?>"><?php echo $value['type_name']; ?></option>
		                                    <?php
		                                    $i++;
		                                }
		                                ?>
									</select>
									<input class="input" placeholder="Search here" name="keyword">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->
						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->
								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><?php if (isset($_SESSION['cart']['count'])) echo $_SESSION['cart']['count']; else echo 0; ?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
										<?php
										// $_SESSION['cart']['1'] = 2;
										// $_SESSION['cart']['2'] = 1;
										// $_SESSION['cart']['3'] = 6;
										// $_SESSION['cart']['4'] = 5;
										if (isset($_SESSION['cart']))
										{
											$_SESSION['cart']['count'] = 0;
											$_SESSION['cart']['price'] = 0;
											$product = new Product();
											$arrProduct = $product->getAllProducts();
											foreach ($_SESSION['cart'] as $id => $qty) {
												foreach ($arrProduct as $value) {
													if ($value['id'] == $id) {
														$_SESSION['cart']['count']++;
														?> 
														<html>
															<div class="product-widget">
																<div class="product-img">
																	<img src="./img/<?php echo $value['image']; ?>" alt="">
																</div>
																<div class="product-body">
																	<h3 class="product-name"><a href="product.html"><?php echo $value['name']; ?></a></h3>
																	<h4 class="product-price"><span class="qty"><?php echo $qty; ?></span><?php echo number_format($value['price'] * $qty); $_SESSION['cart']['price'] += $value['price'] * $qty; ?></h4>
																</div>
																<button class="delete"><a href="delete.php?id=<?php echo $value['id']; ?>"><i class="fa fa-close"></i></a></button>
															</div>
														</html>
														<?php
													}
												}
											}
										}
										?>
										</div>
										<div class="cart-summary">
											<small><?php if (isset($_SESSION['cart']['count'])) echo $_SESSION['cart']['count']; else echo 0; ?> Item(s) selected</small>
											<h5>SUBTOTAL: <?php if (isset($_SESSION['cart']['price'])) echo number_format($_SESSION['cart']['price']); else echo 0; ?></h5>
										</div>
										<div class="cart-btns">
											<a href="viewcart.php">View Cart</a>
											<a href="#">Checkout<i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->