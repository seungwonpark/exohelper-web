<?php
	// // Refer to http://aa.usno.navy.mil/faq/docs/JD_Formula.php
	// Formula given above seems to be wrong. Refer to https://en.wikipedia.org/wiki/Julian_day
	function sign($x){
		if($x>0) return 1;
		else return -1;
	}
	function truncate($x){
		if($x>=0) return intval($x);
		else{
			$x *= -1;
			return (-1)*intval($x);
		}
	}
	function UTCtoJD($year, $month, $day, $hour, $minute, $second){
		$temp_a = intval((14-$month)/12);
		$temp_y = $year + 4800 - $temp_a;
		$temp_m = $month + 12*$temp_a - 3;
		return 365*$temp_y + intval(($temp_y/4)) - intval(($temp_y/100)) + intval(($temp_y/400)) + intval((153*$temp_m + 2)/5) + $day - 32045;
	}
?>
