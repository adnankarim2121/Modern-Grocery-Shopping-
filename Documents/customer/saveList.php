				<?php
					session_start();
   					$data =  $_SESSION['data'];
   					$z = $_SESSION['user_id']; 
   					print_r($data);
		//converts php array to json, so we can store in sql
					$json_string= json_encode($data);
					//create connection again, store in receipts according to which user is logged in,
					$con=mysqli_connect("35.188.41.213","root","cpsc471","saVegan");
					if (mysqli_connect_errno($con))
					 {
					 echo "Failed to connect to MySQL: " . mysqli_connect_error();
					 }
					 $result = mysqli_query($con, "INSERT INTO receipt (products,user_id) VALUES ('$json_string', '$z')");
					 mysqli_close($con);

					?> 