<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <title>aula 05</title>
</head>
<body>
    <div>
        <?php
            $v1 = $_GET["x"];
            $v2 = $_GET["y"];
            echo "<h2>Valores recebidos: $v1 e $v2</h2>";
            echo "O valor $v1<sup>$v2</sup> é ". pow($v1,$v2);
            echo "<br>A raiz de $v1 é ". sqrt($v1);
            echo "<br>Formatação em moeda de 8000 é R$ ". number_format(8000,2,",",".");
        ?>
    </div>
</body>
</html>