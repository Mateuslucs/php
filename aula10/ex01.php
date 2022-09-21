<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <title>ex01</title>
</head>
<body>
    <div>
        <?php
            $op = $_GET["op"];
            $n = $_GET["num"];
            switch($op) {
                case "dobro":
                    $r = $n*2;
                    break;
                case "cubo":
                    $r = /*pow($n,3)*/ $n ** 3;
                    break;
                case "raiz":
                    $r = sqrt($n);        
            }

            echo "seu valor é $r"
        ?>
        <p><a href="ex01_switch.html">Voltar</a></p>
    </div>
</body>
</html>