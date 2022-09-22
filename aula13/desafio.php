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
            $divisores = array();
            for($i = 1; $i <= $num; $i++){
                if($num % $i == 0){
                    array_push($divisores, $i);
                }
            }
            echo "<br>Valor a ser testado: $num";
            echo "<br>Seus divisores: ";
            foreach($divisores as $valor){
                echo "$valor ";
            };
            if(count($divisores) > 2){
                echo "<br>Não é primo";
            }else {
                echo "<br>É primo";
            }
        ?>
        <p><a href="desafio.html">Voltar</a></p>
    </div>
</body>
</html>