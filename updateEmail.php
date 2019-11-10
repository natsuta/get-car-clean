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
    $NewEmail = $_POST['NewEmail'];


    $sql = "select * from customers where email='$Email'";
	$result = $conn->query($sql);
	$row=mysqli_fetch_array($result);

	if (password_verify($Password, $row['password'])) {

    	$sql = "UPDATE customers SET email = '".$NewEmail."' WHERE email = '".$_SESSION['email']."'";

    	$query = mysqli_query( $conn, $sql );

    	echo "Changed email address successfully.";
	}else{
        echo "Your password is incorrect. Go back to the <a href='profile.php'>profile page</a>";
    }

}

include_once("footer.php");
?>