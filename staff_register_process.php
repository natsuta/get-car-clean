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
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$RePassword = $_POST['RePassword'];

	if($Password != $RePassword) {
		echo"Password does not match";
	}
		
	else {
		//hash the password
		$PasswordHash = password_hash($Password, PASSWORD_DEFAULT);

		//connect to database and see if username exists
		$sql="select * from staff where username = '$Username'";
		$result = $conn->query($sql);
		$row=mysqli_fetch_array($result);

		if($row) {
		echo "Username already exists";
		}

		else {

			$query = "insert into staff(username, firstName, lastName, password) 
				VALUES('$Username', '$FirstName', '$LastName', '$PasswordHash')";      
			$result=$conn->query($query);
		
			if($result) {
				mysqli_commit($conn);
				mysqli_close($conn);
				echo "Registration successful. The user ".$Username." can now log in.";
			}

			else {
				echo "Registration failed. Go back to <a href='register.php'>registration page</a>"; 
			}
		}
	}
}
include_once("footer.php");
?>