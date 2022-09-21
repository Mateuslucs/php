<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $n1 = $_GET["n1"];
        $n2 = $_GET["n2"];
        $media = ($n1 + $n2) / 2;
        if($media > 6){
            $r = "<span class='r'>APROVADO</span>";
            $cor = "green";
        } else {
            $r = "em <span class='r'>RECUPERAÇÃO</span>";
            $cor = "red";
        }
    ?>
    <link rel="stylesheet" href="estilo/style.css">
    <style>
        .r {
            color: <?php echo $cor; ?>;
        }
    </style>
    <title>ex02</title>
</head>
<body>
    <div>
        <?php
            echo "A media de $n1 e $n2 é <span class='r'>$media</span>";
            echo "<br>Você está $r!"
        ?>
        <p><a href="ex02_condiçao.html">Voltar</a></p>
    </div>
</body>
</html>