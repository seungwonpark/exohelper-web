<?php
	function myMod($x, $y){
		$z = fmod($x, $y);
		if($z < 0) $z += $y;
		return $z;
	}
?>