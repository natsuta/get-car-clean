<?php
	include_once("header.php");
	if(isset($_SESSION['username']) || isset ($_SESSION['email'])) {
		echo "You are already logged in.";
		exit();
	}
?>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
	<form action="cust_register_process.php" method="post">
		<div class="registration">
			<h2>Register</h2>
			<p>First Name:
				<br>
				<input type="text" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'')" name="FirstName" placeholder="Alphabet only" required maxlength="20"></p>
			<p>Last Name:
				<br>
				<input type="text" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'')" name="LastName" placeholder="Alphabet only" required maxlength="20"></p>
			<p>Mobile Phone:
				<br>
				<input type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" name="Mobile" placeholder="Number only" required maxlength="11"></p>
			<p>Email:
				<br>
				<input type="text" name="Email" required maxlength="50"></p>
			<p>Password:
				<br>
				<input type="password" name="Password" required maxlength="50"></p>
			<p>Repeat Password:
				<br>
				<input type="password" name="RePassword" required maxlength="50"></p>

			<h2>Payment</h2>
			<label for="fname">Accepted Cards</label>
			<div class="icon-container">
			<!-- reference from:https://fontawesome.com/icons -->
				<i class="fa fa-cc-visa fa-3x" style="color:blue"></i>
				<i class="fa fa-cc-mastercard fa-3x" style="color:grey"></i>
				<i class="fa fa-cc-amex fa-3x" style="color:blue"></i>              
			</div>
			<p>Name on Card:
			<br>
			<input type="text" id="cname" name="cardname" required placeholder="Card Name"></p>
			<p>Credit Card Number:
			<br>
			<input type="text" id="ccnum" name="cardnumber" required placeholder="Card Number"></p>
			<p>Expiry Date:
			<br>
			<input type="text" id="expdate" name="expdate" required placeholder="MM/YY" pattern="(?:0[1-9]|1[0-2])/[0-9]{2}" /></p>
			<p>CVV:
			<br>
			<input type="text" id="cvv" name="cvv" required placeholder="CVV Code"></p>

			<button type="submit" class="registerbtn" name="Register">Register</button>
		</div>
	</form>

	<div class="container signin">
		<p>Already have an account? <a href="login">Sign in</a></p>
	</div>
</body>

<?php include_once("footer.php"); ?>