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

	$Username = $_POST["Username"];
	$Password = $_POST["Password"];

	$sql = "select * from staff where username = '$Username'";
	$result = $conn->query($sql);
	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	if (password_verify($Password, $row['password'])) {
		$_SESSION['username'] = $row['username'];
		$_SESSION['firstName'] = $row['firstName'];
		$_SESSION['lastName'] = $row['lastName'];
		$_SESSION['usertype'] = 'Staff';

		echo "You are now logged in.";
	} 
	else {
		echo "Error! Something wrong in your username or password!";
	}
}
include_once("footer.php");
?>