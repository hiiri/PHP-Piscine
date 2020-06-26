<?php
	$user = $_SERVER['PHP_AUTH_USER'];
	$password = $_SERVER['PHP_AUTH_PW'];

	if ($user === "zaz" && $password === "Ilovemylittleponey")
	{
		header('Content-Type: text/html');
		$image = file_get_contents('../img/42.png');
		echo "<html><body>\nHello Zaz<br />\n";
		echo "<img src='data:image/png;base64,".base64_encode($image)."'>\n";
		echo "</body></html>\n";
	}
	else
	{
		header("WWW-Authenticate: Basic realm=''Member area''");
		header("HTTP/1.0 401 Unauthorized");
		echo "<html><body>That area is accessible for members only</body></html>\n";
	}
	header("Connection: close");
?>
