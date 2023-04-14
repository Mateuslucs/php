<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>desafio 01</title>
</head>
<body>

    <pre>
        <?php
        require_once "contaBanco.php";
        $conta1 = new BankAccount("Mateus Lucas");
        $conta1->openAccount('CP');
        //$conta1->setType('CC');
        print_r($conta1);
        
        $conta1->cashout(30);
        $conta1->payMonthlyFee();
        echo $conta1->getBalance()."<br>";

        $conta1->closeAccount();
        ?>
    </pre>
</body>
</html>