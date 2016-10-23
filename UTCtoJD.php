<?php
	// Refer to http://aa.usno.navy.mil/faq/docs/JD_Formula.php
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
		return 367 * $year - truncate( ( 7 * ($year + truncate(($month + 9)/12) ) ) / 4 ) + truncate(275 * $minute / 9) + $day + 1721013.5 + $hour / 24 + $minute / 1440 + $second / 86400;
	}
?>
