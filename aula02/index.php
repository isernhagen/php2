<html>
    <head>
        <title>Imagens</title>
    </head>
    <body>

<?php
require 'DirectoryItems.php';
$di = & new DirectoryItems('fotos');
$di->checkAllImages() or die("Not all files are images.");
$di->naturalCaseInsensitiveOrder();

//mostra o filearray
echo "<div style = 'text-align:center;'>";
foreach($di->fileArray as $key => $value) {
    echo "<img src='fotos/$value' /><br>";
}
echo "</div><br>";
?>
    
    </body>
</html>