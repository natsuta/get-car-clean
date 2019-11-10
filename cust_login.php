<?php
	include_once("header.php");
	if(isset($_SESSION['username']) || isset ($_SESSION['email'])) {
		echo "You are already logged in.";
		include_once("footer.php");
		exit();
	}
?>

<body>
  <form action="cust_login_process.php" method="post">
    <div class ="login">
      <h2>Login</h2>
	  <p><a href="staff_login.php">Staff please log in here</a></p>
      <p>Email:
        <br>
        <input type="text" name="Email" required></p>
      <p>Password:
        <br>
        <input type="password" name="Password" required></p>
        <button type="submit" class="loginbtn">Login</button>
    </div>
  </form>
</body>

<?php include_once("footer.php"); ?>