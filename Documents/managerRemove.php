<?php
$removeProductID = $_POST["removeProductID"];
if(empty($removeProductID)){
	header( 'Location:/tryAgainManagerRemove.html' );

}
else{
// Create connection
$con=mysqli_connect("35.188.41.213","root","cpsc471","saVegan");
// Check connection
if (mysqli_connect_errno($con))
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 $sql = "DELETE FROM products WHERE product_name = '".$removeProductID."'";
 if (!mysqli_query($con,$sql))
 {
 	header( 'Location:/tryAgainManagerRemove.html' );
 //die('Error: ' . mysqli_error($con));

 }
else{
 header( 'Location:/managerAddRemoveSuccess.html' );
 mysqli_close($con);
 exit;
}
}
?>