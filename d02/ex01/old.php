#!/usr/bin/php
<?php
setlocale(LC_ALL, 'fr_FR');
date_default_timezone_set('Europe/Paris');
$date = "Mardi 12 Novembre 2013 12:02:21";
$format = '%A %d %B %Y %H:%M:%S';
$strf = strftime($format);

echo "$strf";
$arr = strptime($date, $format);

print_r($arr);
$seconds = $arr[tm_sec];
$minutes = $arr[tm_min]; //0-59
$hour = $arr[tm_hour]; //0-23
$month_day = $arr[tm_mday]; //1-31
$month = $arr[tm_mon] + 1; //0-11
$year_day = $arr[tm_yday]; // 0-365
$year = $arr[tm_year]; //years since 1900

$year = $year - 70;
$day_seconds = ($year_day + 1) * 24 * 60 * 60;
$epoch = $seconds + $minutes * 60 + $hour * 60 + $day_seconds + ($year*31536000);
print("$year\n");
$year = (12*30*24*60*60);
print("$year\n");
echo "$epoch";
?>
