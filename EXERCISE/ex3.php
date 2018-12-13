<?php
	$binh = 27;
	$minh = $binh / 3;
	$soSachChuyen = 0;
	while ($binh != $minh * 2) {
		$soSachChuyen++;
		$binh--;
		$minh++;
	}
	echo "So sach chuyen : ", $soSachChuyen;
?>