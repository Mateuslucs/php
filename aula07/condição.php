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
            $media = ($n1 + $n2)/2;

            echo "Sua media foi $media";
            $r = ($media > 5)?"Parabêns! Você foi aprovado":"Você foi reprovado";
            echo "<br>$r";
        ?>
    </div>
</body>
</html>