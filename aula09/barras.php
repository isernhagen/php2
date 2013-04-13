<?php

$bg = imagecreatefromjpeg('/home/aluno/php2/aula09/foto.jpeg');
$sizes = getimagesize('/home/aluno/php2/aula09/foto.jpeg'); 
/* pré-definições */
$size_x = 640;
$size_y = 480;
$title1 = 'Acessos ao site X por ano';
$title2 = 'Acessos (em 1.000)';
define('FONTE_TTF', '/usr/share/fonts/ttf/decoratives/betadance.ttf');

$values = array(
	1999 => 5300,
	2000 => 5700,
	2001 => 6400,
	2002 => 6700,
	2003 => 6600,
	2004 => 7100
	);

$max_value = 8000;
$units = 500;

$img = imagecreatetruecolor($size_x, $size_y);
imagealphablending($img, true);
imagecopyresampled(
	$img,
	$bg,
	0, 0, 0, 0,
	$size_x, $size_y, $sizes[0], $sizes[1]);

//azul transparente
$background = imagecolorallocatealpha($img, 127, 127, 192, 32);
//grafico
imagefilledrectangle(
	$img,
	15, 20, $size_x -20, $size_y -80,
	$background
	);

//titulo do grafico
imagefilledrectangle(
	$img,
	15, $size_y -60, $size_x -20, $size_y -20, $background
	);

//grade
$black = imagecolorallocate($img, 0, 0, 0);
$grey = imagecolorallocate($img, 128, 128, 192);
for($i = $units; $i <= $max_value; $i += $units)
{
	$x1 = 110;
	$y1 = $size_y -120 - (($i / $max_value) * ($size_y -160));
	$x2 = $size_x -20;
	$y2 = $y1;
	imageline(
		$img,
		$x1, $y1, $x2, $y2, ($i % (2 * $units)) == 0 ? $black : $grey
		);

}

// eixos
imageline($img, 120, $size_y -120, 120,40, $black);
imageline($img, 120, $size_y -120, $size_x -20, $size_y -120, $black);

//valores
$barcolor = imagecolorallocatealpha($img, 3, 3, 3, 50);
$spacing = ($size_x - 140) / count($values);
$start_x = 120;

foreach( $values as $key => $value)
{
	$x1 = $start_x + 0.2 * $spacing; $x2 = $start_x + 0.8 * $spacing;
	$y1 = $size_y -120;

	$y2 = $y1 -(($value / $max_value) * ($size_y -160));
	imagefilledrectangle($img, $x1, $y2, $x2, $y1, $barcolor);
	$start_x += $spacing;

}

//Titulo X
$c_x = $size_x /2;
$c_y = $size_y -40;

$box = imagettfbbox(20, 0, FONTE_TTF, $title1);
$sx = $box[4] - $box[0];
$sy = $box[5] - $box[1];
imagettftext(
	$img,
	20, 0,
	$c_x - $sx /2, $c_y - ($sy/2),
	$black,
	FONTE_TTF, $title1
	);

//Titulo Y
$c_x = 50;
$c_y = ($size_y - 60) / 2;
$box = imagettfbbox(14, 90, FONTE_TTF, $title2);
$sx = $box[4] - $box[0];
$sy = $box[5] - $box[1];
imagettftext(
	$img,
	14, 90,
	$c_x - ($sx /2), $c_y - ($sy /2),
	$black,
	FONTE_TTF, $title2
	);

/* Rótulos */
$c_y = $size_y - 100;
$start_x = 120;

foreach($values as $label => $dummy) {
    $box = imagettfbbox(12, 0, FONTE_TTF, $label);
    $sx = $box[4] - $box[0];
    $sy = $box[5] + $box[1];
    $c_x = $start_x + (0.5 * $spacing);
    imagettftext(
    	$img,
		12, 0,
		$c_x - ($sx / 2), $c_y - ($sy / 2),
		$black,
		FONTE_TTF, $label
	);

    $start_x += $spacing;
}

$r_x = 100;
for($i = 0; $i <= $max_value; $i += ($units * 2)) {
	$c_y = $size_y - 120 - (($i / $max_value) * ($size_y - 160));
    $box = imagettfbbox(12, 0, FONTE_TTF, $i / 100);
    $sx = $box[4] - $box[0];
    $sy = $box[5] + $box[1];
    imagettftext(
		$img,
		12, 0,
		$r_x - $sx, $c_y - ($sy /2),
		$black,
		FONTE_TTF, $i / 100
	);
}
//saida para o navegador
header ('Content-type: image/png');
imagepng($img);

?>