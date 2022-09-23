<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modelo/style.css">
    <title>01</title>
</head>
<body>
    <div>
        <?php
           $nome = "Mateus Lucas";
           $nome2 = strtoupper($nome);
           echo "seu nome é $nome2";

           $site = "Curso em Video";
           $sub = substr($site,9,5);
           echo "<br>$sub<br>";

           $palavra = "bola";
           $palavra2 = str_pad($palavra, 40, '.', STR_PAD_RIGHT);
           echo "raáz $palavra2 quica"
        ?>
        
    </div>
</body>
</html>