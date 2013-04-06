<?php
	
	echo "<pre>";
	$fp = popen ('cat /etc/passwd', 'r');
	

	while($line = fgets($fp))
	{
		echo $line;
	}

	pclose($fp);