<?php
	include_once("header.php");
	if(!isset($_SESSION['username'])) {
		echo "You do not have permission to access this page.";
		include_once("footer.php");
		exit();
	}
?>

<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		table-layout: fixed;
		width: 100%;
	}
</style>

<body>
	<h2 style="text-align: center;">Car Information</h2>
	<div class="container">
		<table>
		<tr>
			<th>Car Name</th>
			<th>Registration</th>
			<th>Colour</th>
			<th>Car Type</th>
			<th>Availability</th>
			<th>Remove</th>
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

			if(isset($_POST['remove'])) {
				$index = $_POST['remove'];
				$sql = "DELETE FROM cars WHERE carID = $index";
				mysqli_query($conn, $sql);
			}

			$sql = "SELECT * FROM locations;";
			$result=mysqli_query($conn,$sql);

			$num_rows=mysqli_num_rows($result);

			while ($row = mysqli_fetch_assoc($result)){
				$sql2 = "SELECT * FROM cars WHERE locationID = $row[locationID]";
				$result2=mysqli_query($conn,$sql2);

		?>
		<tr><th colspan="6"><?php echo $row['location_address']; ?></th></tr>
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

			if ($row2['hired'] == 1)
				echo "<td>Hired</td>";
			else {
				echo "<td>Available</td>";
		?>
			<form action="cars_remove.php" method="post">
			<td><button type="submit" name="remove" onclick="confirmDelete()" value="<?php echo $row2['carID'] ?>">Remove</button></td>
		<?php } ?>
		</tr>
	</div>
	<?php
				}
			}
		mysqli_close($conn);		     
	?>
		</table>
		<a href='cars_add.php'>Add another car</a>
	</div>
	
</body>

<?php include_once("footer.php"); ?>

<script type="text/javascript">
	function confirmDelete() {
		confirm("Are you sure you want to delete this car?");
	}
</script>