<?php

$descs = array(
	0=>array('pipe', 'r'),
	1=>array('pipe', 'w')
	);

$res = proc_open("php", $descs, $pipes);

if(is_resource($res))
{
	fputs($pipes[0], '<?php echo "Hello World!\n"; ?>');

	fclose($pipes[0]); // faz o proc_open não esperar por mais

	while (!feof($pipes[1])) 
	{
		$line = fgets($pipes[1]);
		echo $line;
	}

	proc_close($res);
}	
?>