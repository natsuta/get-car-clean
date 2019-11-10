<?php
	include_once("header.php");
	if(!isset($_SESSION['username'])) {
		echo "You do not have permission to access this page.";
		exit();
	}
?>

<style media="print">
	head {
		visibility: hidden;
	}
	.print {
		visibility: visible;
	}
	.footer {
		visibility: hidden;
	}
</style>

<body>
	<h2>Rental Information</h2>
	<div class="container print">
			
		<table border="1" align="center" class = "table">
    	<tr>
        	<th align="center" width="10%">Rental ID</th>
        	<th align="center" width="10%">Customer Name</th>
			<th align="center" width="10%">Location Address</th>
        	<th align="center" width="10%">Car Name and Registration</th>
        	<th align="center" width="10%">Start Date</th>
        	<th align="center" width="10%">End Date</th>
        	<th align="center" width="10%">Cost</th>
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

			$sql = "SELECT * FROM rental";
			$result=mysqli_query($conn,$sql);

			while ($row = mysqli_fetch_assoc($result)){
				$sql2 = "SELECT * FROM customers where customerID = $row[customerID]";
				$result2=mysqli_query($conn,$sql2);
				$row2 = mysqli_fetch_array($result2);
	
				$sql3 = "SELECT * FROM cars where carID = $row[carID]";
				$result3=mysqli_query($conn,$sql3);
				$row3 = mysqli_fetch_array($result3);
	
				$sql4 = "SELECT * FROM locations where location_id = $row[locationID]";
				$result4=mysqli_query($conn,$sql4);
				$row4 = mysqli_fetch_array($result4);

				echo "<tr>";
				echo "<td align='center'>".$row['rental_id']."</td>";
				echo "<td align='center'>".$row2['firstName']." ".$row2['lastName']."</td>";
				echo "<td align='center'>".$row4['location_address']."</td>";
				echo "<td align='center'>".$row3['carName']." ".$row3['carRego']."</td>";
				echo "<td align='center'>".$row['start_date']."</td>";
				echo "<td align='center'>".$row['end_date']."</td>";
				echo "<td align='center'>".$row['cost']."</td>";
			echo "</tr>";
		}
		mysqli_close($conn);
				     
?>
	</table>
	</div>
	
</body>
<?php include_once("footer.php"); ?>
