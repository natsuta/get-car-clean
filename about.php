<style>
	body, html {
		height: 100%;
		margin: 0;
	}

	.hero-image {
		background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("imgs/aboutusbanner.jpg");
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
			<h1 style="font-size:50px">About Us</h1>
			<p>GetCar is Australia’s first and largest professional car sharing service and operates in Melbourne.</p>
			<button type="button" onclick="alert('Email: support@getcar.com.au')">Contact Us</button>
		</div>
	</div>

	<div class="content">
		<center>
			<br>
			<h2>Live a more active and convienient life</h2>
			<p>
			GetCar’s aim is to provide a reliable, convenient and affordable transport service that:
			<br>
			<p>✔ Allows people to live car-free
			<br>
			✔ Decreases car usage around Melbourne
			<br>
			✔ Improves local air quality
			<br>
			✔ Increases patronage for public transport
			<br>
			✔ Allows people to lead more active and efficient lives</p>
			<h2>Foundation and vision</h2>
			<p>
			GetCar is formed in partnership with Melbourne City Council to bring car sharing services to Melbourne. Founded in 2019 by director Ameer Albahem, the company has developed a range of business and IT systems that enable the delivery of consulting, technical services and the provision of on-the-ground car share facilities. Feel free to contact us today if you’d like to know more about GetCar.
			<br>
			<h3>Contact Details</h3>
			<p>Phone: 9748 2255 <br> Email: support@getcar.com.au</p>
			<p><b>Want to see how it all works? Click <a href="howto.php">here</a>.</b></p>
			</p> 
		</center>
	</div>

</body>
<?php include_once("footer.php"); ?>