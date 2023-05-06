<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fighters</title>
</head>
<body>
    <?php
    require_once "fighters.php"; 
    $fighters = [];

    $fighters[0] = new Fighters("Mateus lucas", "Brasil", 21, 1.75, 83.6, 10, 0, 0);

    $fighters[1] = new Fighters("Fellipe", "Brasil", 20, 1.65, 59.6, 6, 0, 2);

    $fighters[2] = new Fighters("Dhiovana", "Brasil", 18, 1.75, 46, 0, 0, 0);

    $fighters[3] = new Fighters("Marcos", "Brasil", 20, 1.80, 100, 20, 2, 5);

    $fighters[4] = new Fighters("mero", "Brasil", 48, 1.71, 122.1, 50, 10, 20);

    $fighters[3]->status();
    ?>
</body>
</html>