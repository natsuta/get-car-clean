<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<style>
	.row{
		width: 400px;
	}
</style>

<?php include_once("header.php"); ?>

<body>
<div class="container">
<h1>Profile</h1>
<?php
		$servername = "localhost";
		$username = "root";
		$password = "getcar123456";
		$dbname = "getcar";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$custid = $_SESSION['customerID'];
		$sql = "SELECT * FROM customers WHERE customerID = $custid";
		$sql;
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
	?>

	<div class="row">
		<div class="col-sm">
			<?php
				echo "Email: ".$row['email']."<br/>";
				echo "First Name: ".$row['firstName']."<br/>";
				echo "Last Name: ".$row['lastName']."<br/>";
				echo "Mobile: ".$row['mobile']."<br/>";
				echo "Card Name: ".$row['cardName']."<br/>";
				echo "Card Number: ".$row['cardNumber']."<br/>";
				echo "Expiry Date: ".$row['expDate']."<br/>";
				echo "CVV: ".$row['CVV']."<br/>";
			?>
		</div>
		<p><br/></p>
	</div>

	<h3>Change name</h3>
	<p><button href="#changeName" data-toggle="collapse">Collapsible</button></p>
    <div id="changeName" class="row collapse">
        <form action="updateName.php" method="POST">
            <div class="col-sm">
            	<p>Please input new first name:
				<br>
				<input type="text" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'')" name="FirstName" placeholder="Alphabet only" required maxlength="20"></p>
			</div>
			<div class="col-sm">
            	<p>Please input new last name:
				<br>
				<input type="text" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'')" name="LastName" placeholder="Alphabet only" required maxlength="20"></p>
			</div>
			<div class="col-sm">
            <p>Please input password:
				<br>
				<input type="password" name="Password" required maxlength="50"></p>
            </div>
            <div class="col-sm">
                <p><button type="submit" class="updatebtn">Update</button></p>
            </div>
        </form>
    </div>

	<h3>Change email address</h3>
	<p><button href="#changeEmail" data-toggle="collapse">Collapsible</button></p>
    <div id="changeEmail" class="row collapse">
        <form action="updateEmail.php" method="POST">
            <div class="col-sm">
            	<p>Please input new email address:
				<br>
				<input type="text" name="Email" required maxlength="50"></p>
			</div>
			<div class="col-sm">
            <p>Please input password:
				<br>
				<input type="password" name="Password" required maxlength="50"></p>
            </div>
            <div class="col-sm">
                <p><button type="submit" class="updatebtn">Update</button></p>
            </div>
        </form>
    </div>

	<h3>Change phone number</h3>
	<p><button href="#changePhone" data-toggle="collapse">Collapsible</button></p>
	<div id="changePhone" class="row collapse">
        <form action="updateMobile.php" method="POST">
			<div class="col-sm">
               <p>Please input mobile phone:
				<br>
				<input type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" name="Mobile" placeholder="Number only" required maxlength="11"></p>
			</div>
			<div class="col-sm">
				<p>Please input password:
				<br>
				<input type="password" name="Password" required maxlength="50"></p>
            </div>
            <div class="col-sm">
				<p><button type="submit" class="updatebtn">Update</button></p>
            </div>
        </form>
    </div>

    <h3>Change password</h3>
	<p><button href="#changePassword" data-toggle="collapse">Collapsible</button></p>
	<div href="changePassword" class="row collapse">
        <form action="updatePassword.php" method="POST">
			<div class="col-sm">
               <p>Please input old password:
				<br>
				<input type="password" name="Password" required maxlength="50"></p>
			</div>

			<div class="col-sm">
				<p>Please input new password:
				<br>
				<input type="password" name="NewPassword" required maxlength="50"></p>
            </div>

			<div class="col-sm">
				<p><button type="submit" class="updatebtn">Update</button></p>
            </div>
        </form>
    </div>

	<h3>Change credit card details</h3>
	<p><button href="#changeCard" data-toggle="collapse">Collapsible</button></p>
	<div id="changeCard" class="row collapse">
		<form action="updateCreditCard.php" method="POST">
		<div class="col-sm">
			<label for="fname">Accepted Cards</label>
				<div class="icon-container">
				<!-- reference from:https://fontawesome.com/icons -->
					<i class="fa fa-cc-visa fa-3x" style="color:blue"></i>
					<i class="fa fa-cc-mastercard fa-3x" style="color:grey"></i>
					<i class="fa fa-cc-amex fa-3x" style="color:blue"></i>              
				</div>
			</div>
			<div class="col-sm">
				<p>Name on Card:
				<br>
				<input type="text" id="cname" name="cardname" required placeholder="Card Name"></p>
			</div>
			<div class="col-sm">
				<p>Credit Card Number:
				<br>
				<input type="text" id="ccnum" name="cardnumber" required placeholder="Card Number"></p>
			</div>
			<div class="col-sm">
				<p>Expiry Date:
				<br>
				<input type="text" id="expdate" name="expdate" required placeholder="MM/YY" pattern="(?:0[1-9]|1[0-2])/[0-9]{2}" /></p>
			</div>
			<div class="col-sm">
				<p>CVV:
				<br>
				<input type="text" id="cvv" name="cvv" required placeholder="CVV Code"></p>
			</div>
			<div class="col-sm">
            	<p>Please input password:
				<br>
				<input type="password" name="Password" required maxlength="50"></p>
            </div>
			<div class="col-sm">
				<p><button type="submit" class="updatebtn">Update</button></p>
			</div>
		</form>
	</div>
</div>
</body>
<?php include_once("footer.php"); ?>