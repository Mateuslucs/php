<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <title>ex02</title>
</head>
<body>
    <div>
        <?php

            $c = 1;
            while ($c <= 5){
                $name = "v". $c;
                $v = "v". $c;
                $$v = $_GET["$name"];
                $c++;
            }
            $i = 1;
            while ($i <= 5) {
                $v = "v". $i;
                echo "Valor $i : ". $$v. "<br>";
                $i++;
            }
        ?>
        <p><a href="while_ex02.php">Voltar</a></p>
    </div>
</body>
</html>