<?php
session_start();
include '../DatabaseController.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Your Results</title>
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
					<h2 style= "color:#FFFFFF">Your Results</h2>
				</div>
			</div>
			<div class="row">
				
					<?php
					$budget = $_POST["budget"];
					$people = $_POST["people"];
					$categoryIDString = $_POST["Category"]; //random category selection
					$locationIDString = $_POST["Location"];
					$categoryID;
					$marketID;
					if($locationIDString == 6)
					{
						$marketID = rand(1,5);
					}
					else
					{
						$marketID = (int)$locationIDString;
					}
					if($categoryIDString == 7)
					{
						$categoryID = rand(1,6);
					}
					else{
					$categoryID = (int)$categoryIDString;
					}
					$_SESSION['marker'] = $marketID;
					// Create connection
					$con=mysqli_connect("35.188.41.213","root","cpsc471","saVegan");
					//user checking
					if (empty($budget) || empty($people) || is_numeric($budget) == 0|| is_numeric($people) == 0) #email/password combo doesnt exist, so tell user to try again
						 {
						 	echo "<h1 style='color:#FFFFFF'>Invalid Search. Please Try again.</h1>";
						 //die('Error: ' . mysqli_error($con));

						 }
					// Check connection
					else{
					if (mysqli_connect_errno($con))
					 {
					 echo "Failed to connect to MySQL: " . mysqli_connect_error();
					 }
					$result = mysqli_query($con, "SELECT product_name, aisle_id, price FROM products WHERE products.category_id='".$categoryID."' ORDER BY RAND() LIMIT $people");
					$result2 = mysqli_query($con, "SELECT category_name FROM Categories WHERE Categories.category_id='".$categoryID."'");
					$result3 = mysqli_query($con, "SELECT market_name FROM Market WHERE Market.market_id='".$marketID."'");
					$data = array();
					$temp = mysqli_fetch_array($result);
					$data[]=$temp;
					$sum = 0;
					while($temp = mysqli_fetch_array($result))
								{
									$data[] = $temp;
									$sum+=$temp['price'];
								}
					
					
					
					while($total = mysqli_fetch_array($result))
					{
						$sum+=$total['price'];
					}
					while($sum>$budget){
							$sum = 0;
							$data = array();
							mysqli_free_result($result);
							$result = mysqli_query($con, "SELECT product_name, aisle_id, price FROM products WHERE products.category_id='".$categoryID."' ORDER BY RAND() LIMIT $people");
							$result2 = mysqli_query($con, "SELECT category_name FROM Categories WHERE Categories.category_id='".$categoryID."'");
							$result3 = mysqli_query($con, "SELECT market_name FROM Market WHERE Market.market_id='".$marketID."'");
					        while($temp = mysqli_fetch_array($result))
								{
									$data[] = $temp;
									$sum+=$temp['price'];
								}
							
						
					}

					while($rowTitle = mysqli_fetch_array($result2))
					{
						echo "<h2 style='color:#FFFFFF'> Category: " .$rowTitle['category_name']. "</h2>";
						
						//echo $marketTitle['market_name'];
						 
						
					}

					while($rowTitle = mysqli_fetch_array($result3))
					{
						echo "<h2 style='color:#FFFFFF'> Category Can Be Found At: " .$rowTitle['market_name']. "</h2>
    					<a href='gMaps.html' target='_blank'><input type='submit' class='btn btn-primary' name='someAction' value='Map' /></a>";
						
						//echo $marketTitle['market_name'];
						 
						
					}
					
					echo "<div class='w3-container'>
					<table class='w3-table-all'>
					<tr class='w3-red'>
					<th>Product Name</th>
					<th>Aisle Number</th>
					<th>Price ($)</th>
					</tr>";
					foreach($data as $temp)
					 {

					 echo "<tr>";
					 echo "<td>" .$temp['product_name']. "</td>";
					 echo "<td>" .$temp['aisle_id']. "</td>";
					 echo "<td>" .$temp['price']. "</td>";
					
					 echo "</tr>";
					 
					 }
					echo "<td>"; 
					echo "Total Sum for this Category: $";
					echo $sum; 
					echo " ,which is $";
					echo $budget - $sum;
					echo " less than your desired budget of $";
					echo $budget;
					echo ".";
					echo "</td>";
					echo "</table>";
					echo "</div>";
					mysqli_close($con);
				}
				$_SESSION['data'] = $data;
				//include 'saveList.php';
				//saveList($data) 
				
				/*	//converts php array to json, so we can store in sql
					$json_string= json_encode($data);
					//create connection again, store in receipts according to which user is logged in,
					$con=mysqli_connect("35.188.41.213","root","cpsc471","saVegan");
					if (mysqli_connect_errno($con))
					 {
					 echo "Failed to connect to MySQL: " . mysqli_connect_error();
					 }
					 $result = mysqli_query($con, "INSERT INTO receipt (products) VALUES ('$json_string')");*/

					?> 



			</div>
		</div>
	</div>

	<iframe style="display:none;" name="target"></iframe>
	<a href="saveList.php" target="target"><input type="submit" class="btn btn-primary" value="Save List" onclick="location.href='saveListDone.html';"></a>
	<input type="submit" class="btn btn-primary" value="Print Grocery List" onclick="printList()">
	<input type="submit" class="btn btn-primary" value="Back To Search" onclick="location.href='mainCustomer.php';">
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

