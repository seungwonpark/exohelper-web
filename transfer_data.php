<?php
	$year = $_POST["input_year"];
	$month = $_POST["input_month"];
	$day = $_POST["input_day"];
	$latitude = $_POST["input_latitude"];
	$longitude = $_POST["input_longitude"];
	$timezone = $_POST["select_timezone"];
	$star_no = $_POST["select_exoplanet"];
	if($timezone > 0){
		$timezone_char = '+' . $timezone;
	}
	else{
		$timezone_char = $timezone;
	}
	
?>

<?php
	$twoDarray = array();
	if (($handle = fopen("database/exoplanet_list-selected-numbered.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle)) !== FALSE) {
			$twoDarray[] = $data;
		}
		fclose($handle);
	}
?>