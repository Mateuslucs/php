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
           $t = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod quae officiis ratione officia veritatis. Esse ex neque quae fugiat. Harum amet in alias vitae. Dolores excepturi cupiditate maiores placeat inventore?Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam minima aspernatur impedit, eius doloribus iure nulla necessitatibus unde molestiae velit odit, mollitia laudantium magnam quasi soluta corporis laborum quaerat expedita.<br>";
           echo wordwrap($t, 50, "<br>\n");
           echo "<br> total de letras: ". strlen($t);
           echo "<br> total de palavras: ". str_word_count($t). "<br>";
           print_r(str_word_count($t,1)) ;
           //print_r(explode(" ",$t))
        ?>
        
    </div>
</body>
</html>