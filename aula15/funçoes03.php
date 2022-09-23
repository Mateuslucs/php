<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modelo/style.css">
    <title>01</title>
</head>
<body>
    <div>
        <?php
           $nome = "mateus";
           $vetor = str_split($nome);
           print_r($vetor);

           $carros_list = ["civic","honda","lamborghini","volkswagen"];
           $carros = implode(" ",$carros_list);
           echo "<br>$carros"
        ?>
        
    </div>
</body>
</html>