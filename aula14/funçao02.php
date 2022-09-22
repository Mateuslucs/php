<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modelo/style.css">
    <title>For 01</title>
</head>
<body>
    <div>
        <?php
            include "funcoes.php";
            function teste(&$x){
                $x+=2;
                return $x;
            }
            $a = 4;
            teste($a);
            echo "$a<br>";
            oi("mateus");
        ?>
    </div>
</body>
</html>