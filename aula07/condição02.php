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
            $ano_atual = date("Y");
            $ano = $_GET["ano"];
            $nasc = $ano_atual - $ano;
            echo "Você tem $nasc anos<br>"; 
            echo "". ($nasc >= 19 and $nasc < 65)?"Seu voto é obrigatório":"Seu voto não é obrigatorio"
        ?>
    </div>
</body>
</html>