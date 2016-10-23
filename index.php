<!DOCTYPE html>
<head>
	<?php require_once('header.php') ?>
	<title>Exohelper Web UI</title>
</head>
<html>
<body>
	<div align="center">
		<h1>Exohelper Web UI</h1>
	</div>
	<div class="row center-block">
		<div class="col-sm-5">
			<h2> Type info. </h2>
			<!-- date information -->
			<form name="type_form" action="plot.php" onsubmit="return validateForm()" method="post">
				Type a date of your observation plan. (MM/DD/YYYY) <br>
				<input type="text" class="input_date" name="input_month" placeholder="MM" size="2">
				<input type="text" class="input_date" name="input_day" placeholder="DD" size="2">
				<input type="text" class="input_date" name="input_year" placeholder="YYYY" size="5">
				<br> <br>
				Type your observatory's coordinates. (latitude, longitude) <br>
				<input type="text" class="input_coor" name="input_latitude" placeholder="latitude" size="5">
				<input type="text" class="input_coor" name="input_longitude" placeholder="longitude" size="5">
				<br> <br>
				Select your local timezone. <br>
				<?php require_once('timezone.php'); ?>
				<br> <br>
				Select your target exoplanet. (DB from <a href="http://exoplanets.org/">exoplanets.org</a>) <br>
				<?php require_once('exoplanets.php'); ?>
				<br> <br>
				<input type="submit" value="Get graph.">
			</form>
		</div>
		<div class="col-sm-5">
			<h2> Auxillary tools </h2>			
			<button onclick="getLocation()">Get your coordinates and map.</button>
			<!-- GSHS coordinates - Latitude: 37.3 / Longitude: 127.0 -->
			<p id="show_geolocation"></p>
			<p id="mapholder"></p>
			<button type="button"
			onclick="document.getElementById('show_time').innerHTML = Date()">
			Get current date and time.</button>
			<p id="show_time"></p>
		</div>
	</div>
	
	<script>
	function isValidDate(m, d, y){
		var daysInMonth = [0,31,28,31,30,31,30,31,31,30,31,30,31];
		if ( (!(y % 4) && y % 100) || !(y % 400)) {
			daysInMonth[2] = 29;
		}
		if(d>=1 && d<=daysInMonth[m]){
			return true;
		}
		else{
			return false;
		}
	}
	function validateForm(){
		var m = document.forms["type_form"]["input_month"].value;
		var d = document.forms["type_form"]["input_day"].value;
		var y = document.forms["type_form"]["input_year"].value;
		if(isValidDate(m,d,y) == false){
			alert("Invalid date. Please check it again.");
			return false;
		}
	}
	</script>
	
	<script>
	var x = document.getElementById("show_geolocation");

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition, show_geo_Error);
		} else {
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}
	function showPosition(position) {
		x.innerHTML = "Latitude: " + position.coords.latitude +
		"<br>Longitude: " + position.coords.longitude;
		var latlon = position.coords.latitude + "," + position.coords.longitude;
		var img_url = "https://maps.googleapis.com/maps/api/staticmap?center=" + latlon + "&zoom=14&size=400x300&sensor=false";
		document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
	}
	function show_geo_Error(error) {
		switch(error.code) {
			case error.PERMISSION_DENIED:
				x.innerHTML = "User denied the request for Geolocation. <br> If you're Google Chrome user, this happens because as of Chrome 50, this utility can only be used on HTTPS."
				break;
			case error.POSITION_UNAVAILABLE:
				x.innerHTML = "Location information is unavailable."
				break;
			case error.TIMEOUT:
				x.innerHTML = "The request to get user location timed out."
				break;
			case error.UNKNOWN_ERROR:
				x.innerHTML = "An unknown error occurred."
				break;
		}
	}
	</script>
	<?php require_once('footer.php'); ?>
	
</body>
</html>

