<?php
	$user = "zaz";
	$user = "Ilovemylittleponey";

	header('Content-Type: image/gif');
	$image = file_get_contents('../img/42.png');
	echo base64_encode($image);
?>
