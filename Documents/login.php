<<<<<<< HEAD
<?php
$email = $_POST["usernameL"];
$password = $_POST["passwordL"];


// Create connection
$con=mysqli_connect("35.188.41.213","root","cpsc471","saVegan");
// Check connection
if (mysqli_connect_errno($con))
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 //$sql = "SELECT INTO user (email, password) VALUES ('". $email."','". $password"')";
 $queryUser = mysqli_query($con,"SELECT email,password FROM user WHERE email='".$email."' AND password='".$password."' AND manager IS NULL AND supplier IS NULL"); //user query

$queryManager = mysqli_query($con,"SELECT email,password FROM user WHERE email='".$email."' AND password='".$password."' AND manager IS NOT NULL AND supplier IS NULL"); //manager query

$querySupplier = mysqli_query($con,"SELECT email,password FROM user WHERE email='".$email."' AND password='".$password."' AND manager IS NULL AND supplier IS NOT NULL"); //supplier query

 if (mysqli_num_rows($queryUser) == 0 && mysqli_num_rows($queryManager) == 0 && mysqli_num_rows($querySupplier) == 0) #email/password combo doesnt exist, so tell user to try again
 {
 	header( 'Location:/tryAgainLogin.html' );
 //die('Error: ' . mysqli_error($con));

 }

 else if(mysqli_num_rows($queryUser) != 0) //user login
 {
 	header( 'Location:/main.html' );
 	mysqli_close($con);
 	exit;
 }

 else if(mysqli_num_rows($queryManager) != 0) //manager login
 {
 	header( 'Location:/mainManager.html' );
 	mysqli_close($con);
 	exit;
 }
else{ //supplier login
	 header( 'Location:/mainSupplier.html' );
	 mysqli_close($con);
	 exit;
}

?>



<?php
// Create connection
$con=mysqli_connect("35.188.41.213","root","cpsc471","saVegan");
// Check connection
if (mysqli_connect_errno($con))
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$result = mysqli_query($con, "SELECT * FROM products");
echo "<table border='1'>
<tr>
<th>Product ID</th>
<th>Product Name</th>
<th>Aise ID</th>
<th>Department Name</th>
</tr>";
while($row = mysqli_fetch_array($result))
 {
 echo "<tr>";
 echo "<td>" . $row['product_id'] . "</td>";
 echo "<td>" . $row['product_name'] . "</td>";
 echo "<td>" . $row['aisle_id'] . "</td>";
 echo "<td>" . $row['department_id'] . "</td>";
 echo "</tr>";
 }
echo "</table>";
mysqli_close($con);
?>
=======
<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SaVegan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />


 


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
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
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
					<div id="gtco-logo"><a href="login.html">SaVegan <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

</form>
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/image4.jpg)">
		
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">Welcome to SaVegan</span>
							<h1>Save money by becoming a mindful grocery shopper.</h1>	
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<ul class="tab-menu">
										
										<li class="active gtco-first"><a href="#" data-tab="signup">Sign up</a></li>
										<li class="gtco-second"><a href="#" data-tab="login">Login</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<form action="SignUpController.php" method="post">
												<div class="row form-group">
													<div class="col-md-12">
														<label>Username or Email</label>
														<input type="text" class="form-control" name="username">
														<?php echo $_SESSION['signupEmailError']; ?>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label>Name</label>
														<input type="text" class="form-control" name="fname">
														<?php echo $_SESSION['signupNameError']; ?>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
													<label for="password">Select Your Account Type</label>
													<select name="userType">
													  <option value="1">Customer</option>
													  <option value="2">Manager</option>
													  <option value="3">Supplier</option>
													</select>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password">Password</label>
														<input type="password" class="form-control" name="password" id="password">
														<?php echo $_SESSION['signupPass1Error']; ?>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password2">Repeat Password</label>
														<input type="password" class="form-control" name = "password2" id="password2">
														<?php echo $_SESSION['signupPass2Error']; ?>
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Sign up"
														>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<?php echo $_SESSION['signupError']; ?>
													</div>
												</div>
											</form>
										</div>

										<div class="tab-content-inner" data-content="login">
											<form action="LoginController.php" method="post">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="username">Username or Email</label>
														<input type="text" class="form-control" name = "usernameL" id="usernameL">
														<?php echo $_SESSION['usernameEmptyError']; ?>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password">Password</label>
														<input type="password" class="form-control" name="passwordL" id="passwordL">
														<?php echo $_SESSION['passwordEmptyError']; ?>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Login"
														>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<?php echo $_SESSION['loginError']; ?>
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
							<li><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><i class="icon-mail2"></i> saVegan@ucalgary.ca</a></li>
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
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
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
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

>>>>>>> a4d5318c082200adc5f7c97c0e6d338cd3f4f7cf
