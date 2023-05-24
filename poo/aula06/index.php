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
        require_once 'Pessoa.php';
        require_once 'Aluno.php';
        require_once 'Teacher.php';
        require_once 'Employee.php';
        $p1 = new Peple();
        $p2 = new Aluno();
        $p3 = new Teacher();
        $p4 = new Employee();
        $p1->setNome("mateus lucas");
        $p2->setNome("maria");
        $p3->setNome("jukia");
        $p4->setNome("cuaca");
        print_r($p1);
        print_r($p2);
        print_r($p3);
        print_r($p4);
        ?>
    </pre>
</body>
</html>