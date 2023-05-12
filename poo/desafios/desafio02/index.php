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
        require_once 'peple.php';
        require_once 'book.php';
        $p[0] = new Peple("mateus",21,"M");
        $p[1] = new Peple("dhiovana",18,"F");
        $l[0] = new Book("PHP em POO", "gilson empire", 500, $p[0]);
        $l[1] = new Book("Anne", "merere", 600, $p[1]);
        $l[2] = new Book("Gratidão", "Sra.zoraia", 800, $p[1]);
        

        $l[0]->leafThrough(500);
        $l[0]->advancePage();
        $l[0]->details();
        ?>
    </pre>
</body>
</html>