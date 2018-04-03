<?php
$newProduct = $_POST["newProductName"];
$newProductAisleID = $_POST["newProductAisleID"];
$newProductDepartmentID = $_POST["newProductDepartmentID"];

if(empty($newProduct) || empty($newProductAisleID) || empty($newProductDepartmentID)){
	header( 'Location:/tryAgainManagerAdd.html' );

}
else{
// Create connection
$con=mysqli_connect("35.188.41.213","root","cpsc471","saVegan");
// Check connection
if (mysqli_connect_errno($con))
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 $sql = "INSERT INTO products (product_name, aisle_id, department_id) VALUES ('". $newProduct
."','". $newProductAisleID."', '". $newProductDepartmentID."')";
 if (!mysqli_query($con,$sql))
 {
 	header( 'Location:/tryAgainManagerAdd.html' );
 //die('Error: ' . mysqli_error($con));

 }
else{
 header( 'Location:/managerAddRemoveSuccess.html' );
 mysqli_close($con);
 exit;
}
}
?>