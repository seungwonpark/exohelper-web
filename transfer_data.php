<?php
	// get data from form
	$year = $_POST["input_year"];
	$month = $_POST["input_month"];
	$day = $_POST["input_day"];
	$phi = $_POST["input_latitude"];
	$lam = $_POST["input_longitude"];
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
	// exoplanet DB
	$twoDarray = array();
	if (($handle = fopen("database/exoplanet_list-selected-numbered.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle)) !== FALSE) {
			$twoDarray[] = $data;
		}
		fclose($handle);
	}
	// get exoplanet information from $star_no
	$exo_name = $twoDarray[$star_no][1];
	$exo_per = $twoDarray[$star_no][2];
	$exo_ra = $twoDarray[$star_no][3];
	$exo_dec = $twoDarray[$star_no][4];
	$exo_t14 = $twoDarray[$star_no][5];
	$exo_tt = $twoDarray[$star_no][6];
?>