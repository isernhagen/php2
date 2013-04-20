<?php

$pattern = "/milenium.com.br/";
$replacement = "milenium.com";

$subject = "ana@milenium.com.br, rodrigo@milenium.com.br, kleber@milenium.com.br";

$r = preg_replace($pattern, $replacement, $subject);

var_dump($r); 
?>