<style>
	body, html {
		height: 100%;
		margin: 0;
	}

	.hero-image {
		background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("imgs/howtobanner.jpg");
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

<?php include_once("header.php"); ?>

<body>

	<div class="hero-image">
		<div class="hero-text">
			<h1 style="font-size:50px">GetCar Guide</h1>
			<p>Whether you're running an errand across town or exploring a city far from home, getting there should be easy.</p>
			<?php if(!isset($_SESSION['usertype'])) { ?>
				<button onclick="window.location.href = 'cust_register';">Register</button>
			<?php } ?>
		</div>
	</div>

</body>

	<div class="content">
		<center>
			<br>
			<h2>How to use the GetCar service</h2>
			<p>
			<b>1. Create an account</b> - All you need is an email and mobile number. You can register an account from our website <u><a href="cust_register.php">here</a></u>. If you already have one, book <u><a href="book.php">here</a></u>.
			<br>
			<br>
			<b>2. Select your location</b> - Choose from our list of pickup/return locations. We currently operate in Federation Square, Southern Cross and Melbourne Airport.
			<br>
			<br>
			<b>3. Select your vehicle</b> - GetCar provides a wide range of vehicles to choose from. Economy, Standard, SUV/Wagon, Van and Premium.
			<br>
			<br>
			<b>4. Enter your pickup/return date & time</b> - At GetCar we allow both hourly and daily options. Please use our calculator below for price estimations.
			<br>
			<br>
			<b>5. Confirm booking & checkout</b> - Submit your booking form and checkout through your prefered payment method.
			<br>
			<br>
			<b>6. Enjoy and relax</b> - Collect your vehicle and enjoy your time. Return your vehicle to the same location when your time period comes to an end.
			</p>
		</center>
	</div>

<div class="calculator" style="text-align:center;">
	<h2>Price Calculator</h2>

	<form>
		Vehicle: <select name="type" id="type" onchange="javascript:calcprice();">
			<option value="econ">Economy</option>
			<option value="stdc">Standard</option>
			<option value="suvw">SUV/Wagon</option>
			<option value="wvan">Van</option>
			<option value="prem">Premium</option>
		</select><br/>

		<input type="radio" onclick="javascript:display();" name="booking" id="hourly"> Hourly Rate<br/>
		<input type="radio" onclick="javascript:display();" name="booking" id="daily"> Daily Rate

		<div id="hourcalc" style="display:none">
			Hours: <input id="hours" type="number" min="1" max="6" onchange="javascript:calcprice();">
		</div>

		<div id="daycalc" style="display:none">
			Days: <input id="days" type="number" min="1" max="5" onchange="javascript:calcprice();">
		</div>

		<p id="total"></p>
		<p><b>Want to see how it all works? Click <a href="howto">here</a>.</b></p>
	</form>
</div>
<?php include_once("footer.php"); ?>

<script type="text/javascript">
	
	function display() {
		if (document.getElementById("hourly").checked) {
			document.getElementById("hourcalc").style.display = 'block';
			document.getElementById("daycalc").style.display = 'none';
		}

		else {
			document.getElementById("hourcalc").style.display = 'none';
			document.getElementById("daycalc").style.display = 'block';
		}
	}

	function calcprice() {
		var type = document.getElementById("type").value;
		var hourrate;
		var dayrate;

		switch (type) {
			case "econ":
				hourrate = 7;
				dayrate = 40;
				break;
			case "stdc":
				hourrate = 8.5;
				dayrate = 50;
				break;
			case "suvw":
				hourrate = 11;
				dayrate = 65;
				break;
			case "wvan":
				hourrate = 13;
				dayrate = 72;
				break;
			case "prem":
				hourrate = 15;
				dayrate = 88;
				break;
		}

		if (document.getElementById("hourly").checked) {
			var hours = document.getElementById("hours").value;
			var total = hours * hourrate;
		}

		else {
			var days = document.getElementById("days").value;
			var total = days * dayrate;
		}
		document.getElementById("total").innerHTML = "Total: $" + total;
	}
</script>