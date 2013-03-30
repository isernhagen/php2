<?php

// exceptions.php

$file = @fopen("teste123.txt", "r");

if( ! $file ) {
    $erro = new Exception("Falha ao abrir arquivo", 123);

    throw $erro;
    
}
        
?>
