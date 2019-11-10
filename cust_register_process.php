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
	$Mobile = $_POST['Mobile'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$RePassword = $_POST['RePassword'];
	$cardname = $_POST['cardname'];
	$cardnumber = $_POST['cardnumber'];
	$expdate = $_POST['expdate'];
	$cvv = $_POST['cvv'];

	if($Password != $RePassword) {
		echo"Password does not match";
	}
		
	else {
		//hash the password
		$PasswordHash = password_hash($Password, PASSWORD_DEFAULT);

		//connect to database and see if email exists
		$sql="select * from customers where email = '$Email'";
		$result = $conn->query($sql);
		$row=mysqli_fetch_array($result);

		if($row) {
		echo "Email already exists";
		}

		else {
			$query = "insert into customers(email, firstName, lastName, mobile, password, cardName, cardNumber, expDate, CVV) 
				VALUES('$Email', '$FirstName', '$LastName', '$Mobile', '$PasswordHash', '$cardname', '$cardnumber', '$expdate', '$cvv')";      
			$result=$conn->query($query);
		
			if($result) {
				mysqli_commit($conn);
				mysqli_close($conn);
				echo "Registration successful! Return to <a href='index.php'>home page</a> or <a href='cust_login.php'>log in</a>";
			}

			else {
				echo "Registration failed! Go back to <a href='register.php'>registration page</a>"; 
			}
		}
	}
}
include_once("footer.php");
?>