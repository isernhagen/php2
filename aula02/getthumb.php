<?php
//esse arquivo será o src de uma tag img

require "ThumbnailImage.php";
$path = $_GET['path'];

if(isset($_GET['size']))
    {
        $maxsize = $_GET['size'];
    }
    else
    {
        $maxsize = 100;
    }

if(isset($path))
    {
    $thumb = new ThumbnailImage($path, $maxsize);
    $thumb->getImage();
    }
    
?>
