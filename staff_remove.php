<?php
	include_once("header.php");
	
	if(!isset($_SESSION['username']) && !($_SESSION['username'] == "admin")) {
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
	<h2>Staff</h2>
	<div class="container">
	<form action="staff_remove.php" method="post">
	<table>
		<tr>
			<th>Staff ID</th>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
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
			$sql = "DELETE FROM `staff` WHERE `staff`.`staffID` = $index";
			mysqli_query($conn, $sql);
		}

			$sql = "SELECT * FROM staff WHERE staffID > 1;";
			$result=mysqli_query($conn,$sql);

			$num_rows=mysqli_num_rows($result);

			while ($row = mysqli_fetch_assoc($result)){	
			?>
			<tr>
				<?php
				echo "<td>".$row['staffID']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td>".$row['firstName']."</td>";
				echo "<td>".$row['lastName']."</td>";
				?>
				<td><button type="submit" name="remove" onclick="confirmDelete()" value="<?php echo $row['staffID'] ?>">Remove</button></td>
			</tr>
	<?php
	}
	mysqli_close($conn);
					
	?>
	</table>
	</form>
	<a href='staff_register.php'>Add another staff member</a>
	</div>
	
</body>

<?php include_once("footer.php"); ?>

<script type="text/javascript">
	function confirmDelete() {
		confirm("Are you sure you want to delete this user?");
	}
</script>