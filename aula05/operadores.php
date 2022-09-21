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
            $n1 = $_GET["a"];
            $n2 = $_GET["b"];
            $soma = $n1 + $n2;
            echo "<h2>Valores recebidos: $n1 e $n2</h2>";
            echo "A soma entre $n1 e $n2 é $soma";
            echo "<br>A multiplicação é ". ($n1 * $n2);
        ?>
    </div>
</body>
</html>