<?php
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
 header( 'Location:/main.html' );
 mysqli_close($con);
 exit;
}
}
?>