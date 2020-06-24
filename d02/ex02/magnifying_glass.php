#!/usr/bin/php
<?php
if ($argc == 2)
{
	$file_ptr = fopen($argv[1], "r");
	$content = '';

	if ($file_ptr)
	{
		while (($buffer = fgets($file_ptr, 4096)) !== false)
		{
			$content .= $buffer;
		}
		if (!feof($file_ptr)) {
			echo "fgets() error\n";
		}
	fclose($file_ptr);
	}
	preg_match_all("/(?<=<a).*?(?=\/a>)/s", $content, $matches);

	$str = implode(" ", $matches[0]);

	preg_match_all("/(\"[\s\S]*?\"|>.+?<)/", $str, $matches);

	$replacement = $matches[0];
	$replacement = array_map('strtoupper', $replacement);

	foreach ($matches[0] as &$line)
		$line = "/".$line."/";
	$s = preg_replace($matches[0], $replacement, $content);
	echo $s;
}
?>
