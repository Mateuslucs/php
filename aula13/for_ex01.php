<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modelo/style.css">
    <title>For 01</title>
</head>
<body>
    <div>
        <form action="for_01.php" method="get">
            Numero: 
            <select name="num" id="num">
                <?php
                    for($i = 1; $i <= 10; $i++){
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
                
            </select>
            <p><input type="submit" value="Tabuada"></p>
        </form> 
    </div>
</body>
</html>