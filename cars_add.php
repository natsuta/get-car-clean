<?php
	include_once("header.php");
	if(!isset($_SESSION['username'])) {
		echo "You do not have permission to access this page.";
		include_once("footer.php");
		exit();
	}

	$servername = "localhost";
	$username = "root";
	$password = "getcar123456";
	$dbname = "getcar";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error); 
	}
	else {
?>
<body>
	<form action="cars_add_process.php" method="post">
		<div class="registration">
		<h2>Add Car</h2>
		<p>Car Name:
			<br>
			<input type="text" name="carName" required></p>

		<p>Car Registration:
			<br>
			<input type="text" name="carRego" required></p>

		<p>Car Colour:
			<br>
			<input type="text" name="colour" required></p>

		<p>Select Car Type:
			<br>
			<?php
				$sql = "select * from rates";
				$result = $conn->query($sql);
			?>
			<select name="carType">
				<option value="">Select a Car Type...</option>
				<?php
					while($row=mysqli_fetch_array($result)){
						echo "<option value='$row[carTypeID]'>$row[carType]</option>";
					}
				?>
			</select>
		</p>
		<p>Select Location:
			<br>
			<?php
				$sql = "select * from locations";
				$result = $conn->query($sql);
			?>
			<select name="location">
				<option value="">Select a location...</option>
				<?php
					while($row=mysqli_fetch_array($result)){
						echo "<option value='$row[locationID]'>$row[location_address]</option>";
					}
				?>
			</select>
		</p>

		<button type="submit" class="addcarbtn" name="AddCar">Add Car</button>
		</div>
	</form>
</body>
<?php
}
include_once("footer.php");
?>