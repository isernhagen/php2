<?php
ini_set("display_errors", "on");

require_once "Carro.php";
require_once "CarWrite.php";

$gol = new Carro();
$uno = new Carro();
$corsa = new Carro();

echo "<p>Existem " . Carro::$fabricados . " carros criados</p>";

$writer = new CarWrite;

$gol->setMarca("Wolkswagen");
$gol->setModelo("Gol G4 Power");
$gol->setCor("Vermelho");
$gol->setAno(2013);

//echo $gol->getCarro();

$writer->write($gol);