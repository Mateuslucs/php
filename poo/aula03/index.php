<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php
        require_once 'caneta.php';
        $c1 = new Caneta('BIC',0.5,true);
        //$c1->setModelo('BIC');
        //$c1->setPonta(0.5);
        print "Eu tenho uma caneta {$c1->getModelo()} de ponta {$c1->getPonta()}";

        print_r($c1);
        
        ?>
    </pre>
</body>
</html>