<?php
session_start();
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
 $queryUser = mysqli_query($con,"SELECT email,password, user_id FROM user WHERE email='".$email."' AND password='".$password."'"); //user query
 $queryUser1 = mysqli_query($con,"SELECT email,password, user_id FROM user WHERE email='".$email."' AND password='".$password."'");
 $id = 0;
 while($rowTitle = mysqli_fetch_array($queryUser1))
					{
						
						 	$id = $rowTitle['user_id'];
					}

$_SESSION['user_id'] = $id;


 if (mysqli_num_rows($queryUser) == 0 ) #email/password combo doesnt exist, so tell user to try again
 {
 	header( 'Location:/tryAgainLogin.html' );
 //die('Error: ' . mysqli_error($con));

 }

 else if(mysqli_num_rows($queryUser) != 0) //user login
 {
 	header( 'Location:/main.php' );
 	mysqli_close($con);
 	exit;
 }



?>


