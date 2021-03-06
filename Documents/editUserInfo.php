<?php
session_start();

$customerOptionTitles = array(
	"Logout"
);

$customerOptionLinks = array(
	"login.php"
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
					<div id="gtco-logo"><a href="../login.php">Savegan<em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<?php for ($i = 0; $i < 1; $i++) { ?>
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
							<h1>Update your details.</h1>	
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<ul class="tab-menu">
										<li class="active gtco-first"><a href="#" data-tab="signup">Username</a></li>
										<li class="gtco-second"><a href="#" data-tab="login">Password</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<form action="editUsernameController.php" method="post">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="username">New Username</label>
														<input type="text" name="newUsername1" class="form-control" id="Enter you desired budget here">
														<?php echo $_SESSION['editUsernameError1'];
														      $_SESSION['editUsernameError1'] = ""; ?>
													</div>
													<div class="col-md-12">
														<label for="username">Re-enter Username</label>
														<input type="text" name="newUsername2" class="form-control" id="Enter you desired budget here">
														<?php echo $_SESSION['editUsernameError2']; 
														      $_SESSION['editUsernameError2'] = ""; ?>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Save">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<?php echo $_SESSION['changeUsernameError'];
															  $_SESSION['changeUsernameError'] = ""; ?>
														<?php echo $_SESSION['editUsernameMismatchError']; 
															  $_SESSION['editUsernameMismatchError'] = ""; ?>
													</div>
												</div>
											</form>
										</div>

										<div class="tab-content-inner" data-content="login">
											<form action="editPasswordController.php" method="post">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password">New Password</label>
														<input type="password" name="newPass1" class="form-control" id="Enter your family size here">
														<?php echo $_SESSION['editPasswordError1']; 
														      $_SESSION['editPasswordError1'] = ""; ?>
													</div>
												</div>	
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password">Re-enter Password</label>
														<input type="password" name="newPass2" class="form-control" id="Enter your family size here">
														<?php echo $_SESSION['editPasswordError2'];
															  $_SESSION['editPasswordError2'] = ""; ?>
													</div>
												</div>	
												<div class="row form-group">
													<div class="col-md-12"> 
														<input type="submit" class="btn btn-primary" value="Save">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<?php echo $_SESSION['changePasswordError']; 
														      $_SESSION['changePasswordError'] = ""; ?>
														<?php echo $_SESSION['passwordMismatchError'];
															  $_SESSION['passwordMismatchError'] = ""; ?>
													</div>
												</div>
											</form>
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

