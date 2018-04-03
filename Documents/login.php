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
