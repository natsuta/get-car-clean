<?php
$q = intval($_GET['q']);

$servername = "localhost";
$username = "root";
$password = "getcar123456";
$dbname = "getcar";

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); 
}

$sql="SELECT * FROM cars WHERE locationID = $q";
$result = mysqli_query($conn,$sql);
echo "<select name='car'>";
while($row = mysqli_fetch_array($result)) {
	$sql2="SELECT * FROM rates WHERE carTypeID = $row[carTypeID]";
	$result2 = mysqli_query($conn,$sql2);
	$row2 = mysqli_fetch_array($result2);
	echo "<option value='$row[carID]'>$row2[carType] - $row[colour] $row[carName]</option>";
}
echo "</select>";
mysqli_close($conn);
?>