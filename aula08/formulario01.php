<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <title>formulario01</title>
</head>
<body>
    <div>
        <?php
            $n = $_GET["numero"];
            echo "A raiz de $n é ". number_format(sqrt($n),2);
        ?>
        <a href="modelo01.html">Voltar</a>
    </div>
</body>
</html>