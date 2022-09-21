<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <title>formulario02</title>
</head>
<body>
    <div>
        <?php
            $data_atual = date('Y');
            $nome = isset($_GET["nome"])?$_GET["nome"]:"[Não informado]";
            $data = date_create($_GET["nascimento"]);

            if(date('m') >= date_format($data,'m') and date('d') >= date_format($data,'d')){
                $idade = $data_atual - date_format($data,'Y');
            }else {
                $idade = ($data_atual - date_format($data,'Y')) - 1;
            }
            $sexo = isset($_GET["sexo"])?$_GET["sexo"]:"[Não informado]";

            echo "seu nome é $nome, sua idade é $idade anos e seu sexo é $sexo";
            
        ?>
        <p><a href="modelo02.html">Voltar</a></p>
    </div>
</body>
</html>