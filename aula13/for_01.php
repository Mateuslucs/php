<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <title>For 01</title>
</head>
<body>
    <div>
        <?php
            $num = $_GET["num"];
            for($i = 1; $i <= 10; $i++){
                echo "<br>$num x $i = ". ($num*$i);
            }
        ?>
        <p><a href="for_ex01.php">Voltar</a></p>
    </div>
</body>
</html>