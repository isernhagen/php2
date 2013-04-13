<?php

$url = "http://php.net";
$fil = "compress.zlib://saida.gz";

$begin_time = time();
$size = 0;

/* abre a url */
$fp = fopen($url, "rb", false);
if (is_resource($fp))
		{
			$fs = fopen($fil, "wb9", false);
			if(is_resource($fs))
			{
				echo "[* ";

				/*le os dados da url em bloco de 1024 bytes*/
				while (!feof($fp))
				{
					$data = fgets ($fp, 1024);
					fwrite($fs, $data);
					$size += 1024; //bytes capturados
					usleep(1000); //controle de velocidade
					echo "* ";
				}

			$elapsed_time = time() - $GLOBALS['begin_time']; //exibe informações de download
			printf("] Download time: %ds Speed: %d %s\n",
				$elapsed_time,
				$size/1024/$elapsed_time,
				"Kb/s");

			/* fecha o arquivo local */
			fclose($fs);
			}

			/* fecha o arquivo remoto */
			fclose($fp);
		}


?>