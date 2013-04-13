<?php
//urls.php

$context= stream_context_create(
	array( 'ftp' => array('overwrite' => true)
		)
	);

$fp = fopen('ftp://palm:s3mp@!m@200.163.45.250/ftpjp/teste.txt', 'wb', false, $context);