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
           $salario = $_GET["s"];
           echo "Seu salario é de R$ ". number_format($salario,2,",",".");
           $aumento = $_GET["a"];
           $new_salario = $salario + ($salario*$aumento/100);
           echo "<br>seu aumento em $aumento% é R$ ". number_format($new_salario,2,",",".");
        ?>
    </div>
</body>
</html>