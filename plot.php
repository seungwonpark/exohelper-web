<!DOCTYPE html>
<head>
	<?php require_once('header.php') ?>
	<title>Exohelper Web UI</title>
</head>
<html>
<body>
	<h1>Exohelper Web UI</h1>
	
	<a href="index.php"> Go back </a>
	
	<div align="center">
		<div id="graph" style="width:600px;height:350px;"></div>
	</div>
	
	<?php
		echo 'Input year : ' . $_POST["input_year"];
		$year = $_POST["input_year"];
		$month = $_POST["input_month"];
		$day = $_POST["input_day"];
		$latitude = $_POST["input_latitude"];
		$longitude = $_POST["input_longitude"];
		$timezone = $_POST["select_timezone"];
	?>
	<br>
	<br>
	
	<script>
		TESTER = document.getElementById("graph");
		Plotly.plot( TESTER, [{
		x: [1, 2, 3, 4, 5],
			y: [1, 2, 4, 8, 20] }], {
		margin: { t: 0 } });
	</script>
	
	<?php require_once('footer.php'); ?>
	</body>
</html>
