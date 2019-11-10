<?php include_once("header.php"); ?>
<style>
	body, html {
		height: 100%;
		margin: 0;
	}

	.hero-image {
		background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("imgs/getcarbanner.jpg");
		height: 50%;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		position: relative;
	}

	.hero-text {
		text-align: center;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		color: white;
	}

	.hero-text button {
		border: none;
		outline: 0;
		display: inline-block;
		padding: 10px 25px;
		color: black;
		background-color: #ddd;
		text-align: center;
		cursor: pointer;
	}

	.hero-text button:hover {
		background-color: #555;
		color: white;
	}

</style>

<body>

	<div class="hero-image">
		<div class="hero-text">
			<h1 style="font-size:50px">Welcome to GetCar</h1>
			<?php if(!isset($_SESSION['usertype'])) { ?>
				<p>Sign up now to use our services!</p>
				<button onclick="window.location.href = 'cust_register.php';">Register</button>
			<?php } ?>
		</div>
	</div>

	<div class="content">
		<center>
			<br>
			<h2>We ignite opportunity by setting the world in motion</h2>
			<p>
			Good things happen when people can move, whether across town or towards their dreams. Opportunities appear, open up, become reality. What started as a way to tap a button to get a ride has led to billions of moments of human connection as people around the world go all kinds of places in all kinds of ways with the help of our technology.
			<br>
			<h2> Rent and drive</h2>
			<p>
			GetCar is a carshare company that owns a number of cars parked at various locations around the city of Melbourne. The way our program works is that users will book a car for a period of time, then return it at any GetCar location available. The system incorporates a user, car and rental information database along with a web & mobile application.
			<br>
			<br>
			<p><b>Want to see how it all works? Click <a href="howto.php">here</a>.</b></p>
			</p> 
		</center>
	</div>

</body>
<?php include_once("footer.php"); ?>
