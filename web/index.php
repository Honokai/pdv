<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require __DIR__.'\modelos\produto.php';
        $teste = new Produto;
        echo $teste->pesquisarPorId(1);
    ?>
</body>
</html>