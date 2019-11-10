<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  table-layout: fixed;
  width: 100%;
}
</style>

<?php include_once("header.php"); ?>

<body>
	<h2 style="text-align: center;">Cars</h2>
	<div class="container">
		<table>
		<tr>
			<th>Car Name</th>
			<th>Registration</th>
			<th>Colour</th>
			<th>Car Type</th>
			<th>Hourly Rate</th>
			<th>Daily Rate</th>
			<th>Availability</th>
		</tr>
		<?php
			
			$servername = "localhost";
			$username = "root";
			$password = "getcar123456";
			$dbname = "getcar";

			$conn = mysqli_connect($servername, $username, $password, $dbname);

			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$sql = "SELECT * FROM locations;";
			$result=mysqli_query($conn,$sql);

			$num_rows=mysqli_num_rows($result);

			while ($row = mysqli_fetch_assoc($result)){
				$sql2 = "SELECT * FROM cars WHERE locationID = $row[locationID]";
				$result2=mysqli_query($conn,$sql2);

		?>
		<tr><th colspan="7"><?php echo $row['location_address']; ?></th></tr>
		<?php
			while($row2 = mysqli_fetch_assoc($result2)){
				$sql3 = "SELECT * FROM rates WHERE carTypeID = $row2[carTypeID]";
				$result3=mysqli_query($conn,$sql3);
				$row3=mysqli_fetch_array($result3);
		?>
		<tr>
		<?php
			echo "<td>".$row2['carName']."</td>";
			echo "<td>".$row2['carRego']."</td>";
			echo "<td>".$row2['colour']."</td>";
			echo "<td>".$row3['carType']."</td>";
			echo "<td>$".$row3['hourlyrate']."</td>";
			echo "<td>$".$row3['dailyrate']."</td>";

			if ($row2['hired'] == 1)
				echo "<td>Hired</td>";
			else
				echo "<td>Available</td>";
		?>
		</tr>
	</div>
	<?php
				}
			}
		mysqli_close($conn);
		echo "</table><br/>";

		if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'Customer'){
			echo "<p>Interested in booking a car? Head on over to the <a href='book'>booking page</a>!</p>";
		}
		elseif(!isset($_SESSION['usertype']) || !isset($_SESSION['username'])){
			echo "<p>Interested in booking a car? <a href='cust_login'>Log in</a> and book now!</p>";
		}

	?>
		
	</div>
	
</body>
<?php include_once("footer.php"); ?>