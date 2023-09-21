<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'Visitant.php';

    $v = new Visitant();
    $teste = Visitant::teste("merda");
    echo $teste;
    ?>
</body>
</html>