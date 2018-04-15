<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Your Inventory</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
					<div id="gtco-logo"><a href="mainCustomer.php">Savegan <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					
				</div>
			</div>
			
		</div>
	</nav>

	
	<div class="gtco-section border-bottom" style="background-image: url(../images/produce4.jpeg)">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 style= "color:#FFFFFF">Vegan Only</h2>
				</div>
			</div>
			<div class="row">
				
					<?php
					// Create connection
					$categoryID = 1;
					$marketID = rand(1,5); //random market selection
					$_SESSION['marker'] = $marketID;

					$con=mysqli_connect("35.188.41.213","root","cpsc471","saVegan");
					// Check connection
					if (mysqli_connect_errno($con))
					 {
					 echo "Failed to connect to MySQL: " . mysqli_connect_error();
					 }
					$result = mysqli_query($con, "SELECT product_name, aisle_id, price FROM products WHERE products.category_id='".$categoryID."' ORDER BY RAND() LIMIT 10");
					$result2 = mysqli_query($con, "SELECT market_name FROM Market WHERE Market.market_id='".$marketID."'");
					while($rowTitle = mysqli_fetch_array($result2))
					{
						echo "<h2 style='color:#FFFFFF'> Category Can Be Found At: " .$rowTitle['market_name']. "</h2>
    					<a href='gMaps.html' target='_blank'><input type='submit' class='btn btn-primary' name='someAction' value='Map' /></a>";
						 	
					}
					echo "<div class='w3-container'>
					<table class='w3-table-all'>
					<tr class='w3-red'>
					<th>Product Name</th>
					<th>Aisle Number</th>
					<th>Price ($)</th>
					</tr>";
					$sum = 0;
					$data = array();
					while($temp = mysqli_fetch_array($result))
								{
									$data[] = $temp;
									
								}
					foreach($data as $temp)
					 {

					 echo "<tr>";
					 echo "<td>" . $temp['product_name'] . "</td>";
					  echo "<td>" .$temp['aisle_id']. "</td>";
					 echo "<td>" . $temp['price'] . "</td>";
					 $sum+=$temp['price'];
					 echo "</tr>";
					 
					 }
					echo "<td>"; 
					echo "Total Sum for this Category: $";
					echo $sum; 
					echo "</td>";
					echo "</table>";
					echo "</div>";
					mysqli_close($con);
					$_SESSION['data'] = $data;
					?>

			</div>
		</div>
	</div>
	<iframe style="display:none;" name="target"></iframe>
	<a href="saveList.php" target="target"><input type="submit" class="btn btn-primary" value="Save List" onclick="location.href='saveListDone.html';"></a>
	<input type="submit" class="btn btn-primary" value="Print Grocery List" onclick="printList()";">
	<input type="submit" class="btn btn-primary" value="Back To Pre-Categories" onclick="location.href='preCategories.html';">
	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> saVegan@ucalgary.ca</a></li>
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
	
	<script>
		function printList() {
		    window.print();
		}
 
   </script>
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

