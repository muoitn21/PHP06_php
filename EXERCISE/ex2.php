<?php
	$tuiMot = 18;
	$tuiHai = $tuiMot * 2;
	$soBiChuyen = 0;
	while ($tuiMot != $tuiHai) {
		$soBiChuyen++;
		$tuiMot++;
		$tuiHai--;
	}
	echo "So bi chuyen : ", $soBiChuyen;
?>