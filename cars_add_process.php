<?php
include_once("header.php");
$servername = "localhost";
$username = "root";
$password = "getcar123456";
$dbname = "getcar";

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); 
}
else {
	$carName = $_POST['carName'];
	$carRego = $_POST['carRego'];
	$colour = $_POST['colour'];
	$carType = $_POST['carType'];
	$location = $_POST['location'];

	//connect to database and see if rego exists
	$sql="select * from cars where carRego = '$carRego'";
	$result = $conn->query($sql);
	$row=mysqli_fetch_array($result);

	if($row) {
		echo "Car registration already exists";
	}

	else {
		$query = "insert into cars(carName, carRego, carTypeID, colour, locationID) 
			VALUES('$carName', '$carRego', '$carType', '$colour', '$location')";      
		$result=$conn->query($query);
	
		if($result) {
			mysqli_commit($conn);
			mysqli_close($conn);
			echo "Car has been added. You may wish to add <a href='cars_add.php'>another car</a>.";
		}

		else {
			echo "Failed to add car. Try again.";
		}
	}
}
include_once("footer.php");
?>