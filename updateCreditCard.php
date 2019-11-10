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

    $Email = $_SESSION['email'];
    $Password = $_POST["Password"];
    $cardname = $_POST['cardname'];
	$cardnumber = $_POST['cardnumber'];
	$expdate = $_POST['expdate'];
	$cvv = $_POST['cvv'];


    $sql = "select * from customers where email='$Email'";
	$result = $conn->query($sql);
	$row=mysqli_fetch_array($result);

	if (password_verify($Password, $row['password'])) {

    	$sql = "UPDATE customers 
		SET cardName = '".$cardname."',
			cardNumber = '".$cardnumber."',
			expDate = '".$expdate."',
			CVV = '".$cvv."' 
		WHERE email = '".$_SESSION['email']."'";

    	$query = mysqli_query( $conn, $sql );

    	echo "Changed credit card details successfully.";
	}else{
        echo "Your password is incorrect. Go back to the <a href='profile.php'>profile page</a>";
    }

}

include_once("footer.php");
?>