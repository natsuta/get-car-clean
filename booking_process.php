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
	$customerID = $_SESSION['customerID'];
	$location = $_POST['location'];
	$car = $_POST['car'];
	//change the date/time format
	$startdate = $_POST['pickupdate']." ".$_POST['pickuptime'].":00";
	$enddate = $_POST['returndate']." ".$_POST['returntime'].":00";

	//check if end time is not earlier than start time
	$starttimestamp = strtotime($startdate);
	$endtimestamp = strtotime($enddate);
	$difference = ($endtimestamp - $starttimestamp)/3600;
	if ($difference < 1) {
		die("Time selection invalid, please try again");
	}

	//calculate cost
	$cost;
	$sql = "select * from cars where carID = '$car'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
	
	$sql2 = "select * from rates where carTypeID = '$row[carTypeID]'";
	$result2 = $conn->query($sql2);
	$row2 = mysqli_fetch_array($result2);
	$hourlyrate = $row2['hourlyrate'];
	$dailyrate = $row2['dailyrate'];

	if ($difference <= 6) {
		$cost = $hourlyrate * $difference;
	}
	else if ($difference <= 120) {
		$days = $difference / 24;
		$cost = $dailyrate * $days;
	}
	else {
		die ("You have selected too many days for your hire, please try again");
	}

	$cost = number_format($cost, 2);

	$query = "insert into rental(customerID, locationID, carID, start_date, end_date, cost) 
		VALUES('$customerID', '$location', '$car', '$startdate', '$enddate', '$cost')";      
	$result=$conn->query($query);

	if($result) {
		mysqli_commit($conn);
		echo "Booking added! </a>";
	}
	else {
		echo "Booking failed</a>"; 
	}
	mysqli_close($conn);
	
}
include_once("footer.php");
?>