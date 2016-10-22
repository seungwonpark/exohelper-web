<?php
	echo '<select name="select_exoplanet">';
	$file_DB = fopen('database/exoplanet_list-selected-numbered.csv', 'r');
	$row = fgetcsv($file_DB); // initialize exoplanet selection
	while(!feof($file_DB)){
		$row = fgetcsv($file_DB);
		$exoplanet_num = $row[0];
		$exoplanet_name = $row[1];
		echo '<option value="';
		echo $exoplanet_num;
		echo '">';
		echo $exoplanet_name;
		echo '</option>';
		echo "\r\n";
	}
	echo '</select>';
?>
