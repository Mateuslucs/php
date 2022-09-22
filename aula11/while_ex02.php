<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <title>while</title>
</head>
<body>
    <div>
        <form action="ex02.php" method="get">
            <?php
                $n = 1;
                while ($n <= 5) {
                    echo "valor $n: <input type='number' name='v$n' id='v$n' class='n' style='width: 30px;'><br>";
                    $n++;
                }
            ?>
            <p><input type="submit" value="Enviar"></p>
        </form> 
    </div>
</body>
</html>