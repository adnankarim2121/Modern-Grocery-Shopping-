<?php
session_start();

$customerOptionTitles = array(
	"View Past Purchases",
	"Contact Us",
	"Logout"
);

$customerOptionLinks = array(
	"receipts.php",
	"../contact.php",
	"../login.php"
);

$managerOptionTitles = array(
	"View Your Inventory",
	"View Suppliers",
	"View Customers"
);

$managerOptionLinks = array(
	"managerInventory.php",
	"supplierList.php",
	"customerList.php"
);

$supplierOptionTitles = array(
	"View Your Inventory", 
	"View Orders"
);

$supplierOptionLinks = array(
	"supplierInventory.php",
	"orderList.php"
);

?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>saVegan Main</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />


  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="../css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<div class="page-inner">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="mainCustomer.php">Savegan<em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<?php for ($i = 0; $i < 3; $i++) { ?>
						<li class="btn-cta"><a href=<?=$customerOptionLinks[$i]?>><span><?=$customerOptionTitles[$i]?></span></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(../images/image2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class='intro-text-small'>Welcome to SaVegan, <?=$_SESSION['name']?></span>";
							<h1>Save money by becoming a mindful grocery shopper.</h1>	
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<ul class="tab-menu">
										<li class="active gtco-first"><a href="#" data-tab="signup">Search</a></li>
										<li class="gtco-second"><a href="#" data-tab="login">All Categories</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<form action="userSearch.php" method="post">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="username">Budget</label>
														<input type="text" name="budget" class="form-control" id="Enter you desired budget here" placeholder="$">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password">Amount of People</label>
														<input type="text" name="people" class="form-control" id="Enter your family size here" placeholder="1 - 10">
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
													<label for="password">Select Desired Category</label>
													<select name="Category">
													  <option value="1">Netflix & Chill</option>
													  <option value="2">General Health</option>
													  <option value="3">Party Night</option>
													  <option value="4">Date Night</option>
													  <option value="5">Junk Galore</option>
													  <option value="6">Vegan Only</option>
													  <option value="7">Randomly Choose for Me</option>
													</select>
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
													<label for="password">Select Desired Location</label>
													<select name="Location">
													  <option value="1">Walmart</option>
													  <option value="2">Superstore</option>
													  <option value="3">Save on Foods</option>
													  <option value="4">Safeway</option>
													  <option value="5">Co-op</option>
													  <option value="6">Randomly Choose for Me</option>
													</select>
													</div>
												</div>											

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Submit">
													</div>
												</div>
											</form>
										</div>

										<div class="tab-content-inner" data-content="login">
											
												<div class="row form-group">
													<div class="col-md-12"> 
														<input type="submit" class="btn btn-primary" value="Search All Categories" onclick="location.href='preCategories.html';">
													</div>
												</div>
											
										</div>


									</div>
								</div>
							</div>
						</div>
					</div>
							
					
				</div>
			</div>
		</div>
	</header>
	

	<div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Some Facts about Grocery Shopping</h2>
					<p>The more you know, the better.</p>
					<small>*Data provided by our research team as of 2018</small>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="220" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Weekly Cost of Groceries for a Family of Four (in Canadian Dollars)</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-time"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="41" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Average Time Spent in the Grocery Store (Minutes)</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-briefcase"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="43" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Percentage of the Canadian Population that use Grocery Lists</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-face-smile"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="35034" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Number of SuperMarkets in Canada</span>

					</div>
				</div>
					
			</div>
		</div>
	</div>

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="mailto:saVegan@ucalgary.ca?Subject=Hello%20SaVegan"><i class="icon-mail2"></i> saVegan@ucalgary.ca</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>

	</body>
</html>

