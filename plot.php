<!DOCTYPE html>
<head>
	<?php require_once('header.php') ?>
	<title>Exohelper Web UI</title>
</head>
<html>
<body>
	<div align="center">
		<h1>Exohelper Web UI(WIP)</h1>
	</div>
	
	<a href="index.php"> Go back </a>
	
	<?php include_once('transfer_data.php'); ?>
	<?php include_once('calculation.php'); ?>
	
	<div align="center">
		<div id="myDiv" style="width:600px;height:350px;"></div>
	</div>
	
	<br>
	<br>
	
	<?php
		$plot_title = "'Exoplanet observation guide in " . $month . "." . $day . "." .$year . " at GMT " . $timezone_char . " of " . $exo_name . "'";
		$plot_xaxis_title = "'Time'";
		$plot_yaxis_title = "'Altitude'";
	?>
	
	<script>
		var trace1 = {
		  x: [0, 1, 2, 3, 4, 5, 6, 7, 8],
		  y: [0, 1, 2, 3, 4, 5, 6, 7, 8],
		  name: 'Name of Trace 1',
		  type: 'scatter'
		};
		var trace2 = {
		  x: [0, 1, 2, 3, 4, 5, 6, 7, 8],
		  y: [1, 0, 3, 2, 5, 4, 7, 6, 8],
		  name: 'Name of Trace 2',
		  type: 'scatter'
		};
		var data = [trace1, trace2];
		var layout = {
		  title: <?php echo $plot_title; ?>,
		  xaxis: {
			title: <?php echo $plot_xaxis_title; ?>,
			titlefont: {
			  family: 'Helvetica, monospace',
			  size: 18,
			  color: '#7f7f7f'
			}
		  },
		  yaxis: {
			title: <?php echo $plot_yaxis_title; ?>,
			titlefont: {
			  family: 'Helvetica, monospace',
			  size: 18,
			  color: '#7f7f7f'
			}
		  }
		};
		Plotly.newPlot('myDiv', data, layout);
	</script>
	
	<?php require_once('footer.php'); ?>
	</body>
</html>
