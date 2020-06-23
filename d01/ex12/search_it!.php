#!/usr/bin/php
<?php
if ($argc > 2)
{
    $first = true;
    $last_found = null;
    foreach ($argv as $arg)
    {
        if ($first == true)
        {
            $first = false;
            continue;
        }
        $key = substr($arg, 0, strpos($arg, ":"));
        if ($key == $argv[1])
        {
            $value = substr($arg, strpos($arg, ":") + 1);
            $last_found = $value;
        }
    }
    if ($last_found != null)
        echo "$last_found\n";
}
?>
