<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <title>ex01</title>
</head>
<body>
    <div>
        <?php
            $ano_atual = date('Y');
            $ano = date_create($_GET["ano"]);
            if(date_format($ano,'m-d') <= date('m-d')){
                $idade = $ano_atual - date_format($ano,'Y');
            }else{ 
                $idade = ($ano_atual - date_format($ano,'Y')) - 1;
            }

            echo "Você tem $idade anos ";
            if($idade >= 18 and $idade <= 64){
                $tipo = "<br>voto obrigatorio e pode dirigir!";
            } elseif ($idade >= 16 and $idade < 18) {
                $tipo = "<br>Voto opcional e não pode dirigir";
            } else {
                $tipo = "<br>seu voto é opcional porém você precisa atualizar a sua habilitação";
            }
            
            echo "$tipo";
        ?>
        <p><a href="ex_condiçao.html">Voltar</a></p>
    </div>
</body>
</html>