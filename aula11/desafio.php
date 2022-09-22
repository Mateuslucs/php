<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <title>desafio</title>
</head>
<body>
    <div>
        <?php
            $in = $_GET["in"];
            $fim = $_GET["fim"];
            $pulo = $_GET["pulo"];

            if($in > $fim) {
                while ($in >= $fim) {
                    echo "$in ";
                    $in-=$pulo;
                }
            }else {
                while ($in <= $fim) {
                    echo "$in ";
                    $in+=$pulo;
                }
            }
            
        ?>
        <p><a href="desafio.html">Voltar</a></p>
    </div>
</body>
</html>