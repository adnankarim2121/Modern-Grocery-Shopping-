<?php
session_start();
$email = $_POST["username"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

if(strcmp($password,$password2)!=0 || empty($email) || empty($password)){
	header( 'Location:/tryAgain.html' );

}
else{
// Create connection
$con=mysqli_connect("35.188.41.213","root","cpsc471","saVegan");
// Check connection
if (mysqli_connect_errno($con))
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 $sql = "INSERT INTO user (email, password) VALUES ('". $email."','". $password
."')";
 if (!mysqli_query($con,$sql))
 {
 	header( 'Location:/tryAgain.html' );
 //die('Error: ' . mysqli_error($con));

 }
else{
$queryUser1 = mysqli_query($con,"SELECT email,password, user_id FROM user WHERE email='".$email."' AND password='".$password."'"); //user query
$id = 0;
while($rowTitle = mysqli_fetch_array($queryUser1))
					{
						
						 	$id = $rowTitle['user_id'];
					}

$_SESSION['user_id'] = $id;
 header( 'Location:/main.php' );
 mysqli_close($con);
 exit;
}
}
?>