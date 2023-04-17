<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Remote Control Project</h1>
    <pre>
        <?php
        require_once "RemoteControl.php";
        $c = new RemoteControl();
        $c->powerOn();
        $c->openMenu();
        ?>
    </pre>
</body>
</html>