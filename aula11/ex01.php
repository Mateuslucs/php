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
            $n = 10;
            while ($n >= 0) {
                echo "<br>$n";
                $n-=2;
            }
        ?>
        <p><a href="while_ex01.html">Voltar</a></p>
    </div>
</body>
</html>