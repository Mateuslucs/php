<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <?php
        $txt = isset($_GET["t"])?$_GET["t"]:"Texto generico";
        $tam = $_GET["tam"];
        $cor = isset($_GET["cor"])?$_GET["cor"]:"#000000";
    ?>
    <style>
        .texto {
            font-size: <?php echo $tam; ?>;
            color: <?php echo $cor; ?>;
        }
    </style>
    <title>formulario03</title>
</head>
<body>
    <div>
        <?php
            echo "<span class='texto'>$txt</span>";
        ?>
        <p><a href="modelo03.html">Voltar</a></p>
    </div>
</body>
</html>