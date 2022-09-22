<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <title>do While</title>
</head>
<body>
    <div>
        <?php
            $fat = $_GET["fat"];
            $r = 1;
           do {
            if($fat > 1){
                echo $fat." x ";
            }else {
                echo $fat;
            }
            
            $r *= $fat;
            $fat--;
            
           } while($fat >= 1);
           
           echo " = $r"
        ?>
        <p><a href="doWhile.html">Voltar</a></p>
    </div>
</body>
</html>