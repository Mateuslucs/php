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
            function soma ($a, $b){
                $s = $a + $b;
                return $s;
            }
            echo soma(10, 41);

            function soma2(){
                $v = func_get_args();
                $total = func_num_args();
                $s = 0;
                for($i = 0; $i < $total; $i++){
                    $s+=$v[$i];
                }
                return $s;
            }

            echo "<br>a soma de 2,4,6 e 8 é: ". soma2(2,4,6,8);
        ?>
    </div>
</body>
</html>