<?php
	// calculate Julian Day of observation
	include_once('UTCtoJD.php');
	include_once('myMod.php');
	$JD = UTCtoJD($year, $month, $day, 0, 0, 0);
	echo $JD;
	echo '<br>';
	
	// calculate information of sun
	calculate_sun();
	calculate_transit();
	$sun_southing = calculate_SunSouthing();
	
	// calculate information of exoplanet
	$exo_southing = calculate_ExoSouthing();
	
	// Declare some variables as global (though this is not proper way)
	$sun_ra = 0;
	$sun_dec = 0;
	$EOT_min = 0;
	$exo_set = 0;
	$exo_rise = 0;
	
	function calculate_sun(){ // no returning value.
		$d = $JD - 2451543.5;
		$w = deg2rad(282.9404 + 4.70935 / pow(10, 5) * $d);
		$e = 0.016709 - 1.1519 / pow(10, 9) * $d;
		$M = deg2rad(fmod((356.0470 + 0.9856002585 * $d), 360.0));
		$oblecl = deg2rad(23.4393 - 3.563 / pow(10, 7) * $d);
		$E = $M + $e * sin($M) * (1 + $e * cos($M));
		$x = cos($E) - $e;
		$y = sin($E) * sqrt(1 - $e * $e);
		$v = atan2($y, $x);
		$lon = $v + $w;
		$xequat = cos($lon);
		$yequat = sin($lon) * cos($oblecl);
		$zequat = sin($lon) * sin($oblecl);
		$sun_ra = atan2($yequat, $xequat) * 180 / M_PI / 15;
		$sun_dec = rad2deg(atan2($zequat, sqrt($xequat * $xequat + $yequat * $yequat)));
		$EOT_min = -7.659 * sin($M) + 9.863 * sin(2 * $M + 3.5932);
	}
	function calculate_transit(){ // no returning value.
		$transit_start = $exo_tt - ($exo_t14 / 2.0) / 86400;
		$transit_end = $exo_tt + ($exo_t14 / 2.0) / 86400;
	}
	function calculate_SunSouthing(){
		$JD_cen = ($JD - 2451545.0) / 36525;
		$LST = $sun_ra;
		$GST = $LST + $lam / 15.0;
		$theta = 100.46061837 + 36000.770053608 * $JD_cen + 0.000387933 * pow($JD_cen, 2) + pow(JD_cen, 3) / 38710000.0;
		$UTC = ($GST - fmod($theta, 360.0) / 15.0) / 1.00273790935 + $EOT_min / 60;
		$LocalTime = $UTC + $timezone;
		$LocalTime = myMod($LocalTime, 24);
		return $LocalTime;
	}
	function calculate_ExoSouthing(){
		$JD_cen = ($JD - 2451545.0) / 36525;
		$LST = $exo_ra;
		$GST = $LST + $lam / 15.0;
		$theta = 100.46061837 + 36000.770053608 * $JD_cen + 0.000387933 * pow($JD_cen, 2) + pow(JD_cen, 3) / 38710000.0;
		$UTC = ($GST - fmod($theta, 360.0) / 15.0) / 1.00273790935;
		$LocalTime = $UTC + $timezone;
		$LocalTime = myMod($LocalTime, 24);
		return $LocalTime;
	}
	function calculate_exo_RiseSet(){
		$temp_t = acos((-1) * tan(rad2deg($phi)) * tan(rad2deg($exo_dec)));
		$exo_rise = $exo_southing - $temp_t * 12.0 / M_PI;
		$exo_set = $exo_southing + $temp_t * 12.0 / M_PI;
		$exo_rise = myMod($exo_rise, 24);
		$exo_set = myMod($exo_set, 24);
	}
?>
