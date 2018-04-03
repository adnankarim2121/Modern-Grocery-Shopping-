<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>

<body>
<?php
// Create connection
$con=mysqli_connect("35.188.41.213","root","cpsc471","saVegan");
// Check connection
if (mysqli_connect_errno($con))
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$result = mysqli_query($con, "SELECT * FROM Department");
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
</tr>";
while($row = mysqli_fetch_array($result))
 {
 echo "<tr>";
 echo "<td>" . $row['department_id'] . "</td>";
 echo "<td>" . $row['department'] . "</td>";
 echo "</tr>";
 }
echo "</table>";
mysqli_close($con);
?>
</body>
</html>



