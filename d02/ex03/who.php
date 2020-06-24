#!/usr/bin/php
<?php
if ($argc == 1)
{
	# utmpx format:
	# https://github.com/libyal/dtformats/blob/master/documentation/Utmp%20login%20records%20format.asciidoc

	$file_ptr = fopen("/var/run/utmpx", 'rb');
	date_default_timezone_set('Europe/Helsinki');
	if ($file_ptr)
	{
		# skip header and first record with data unused by who
		fseek($file_ptr, 628, SEEK_CUR);
		fseek($file_ptr, 628, SEEK_CUR);
		while (!feof($file_ptr))
		{
			$records = fread($file_ptr, 628);
			if (strlen($records) == 628)
			{
				# unpack record binary data into string/int fields
				# we are only interested in the username, terminal name and timestamp
				$data = unpack('A256username/A4id/A32terminal/ipid/ilogin_type/itimestamp', $records);
				if ($data['login_type'] == 7)
				{
					echo $data["username"]."  ";
					echo $data["terminal"]."  ";
					$date_format = "M d H:i";
					echo date($date_format, $data["timestamp"])." \n";
				}
			}
		}
	fclose($file_ptr);
	}
}
?>
