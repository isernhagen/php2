<?php
ini_set('display_errors', 'On');
header('Content-Type: text/html; charset=utf-8');


require_once 'Square.php';
require_once 'Circle.php';

$circle = new Circle();
$square = new Square();

$circle->draw();
$square->draw();

?>
