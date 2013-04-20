<?php

$pattern = "/(?P<username>[a-z]+)@(?<domain>[a-z]+\.([a-z]{2,3}\.[a-z]{2,3})/";

$patern = "/[rR]icardo [aA]ugusto [iI]sernhagen/"	

$subject = "ricardo augusto isernhagen";

$r = preg_match($pattern, $subject, $matches);

echo "<pre>";
var_dump($r);
print_r($matches);


?>