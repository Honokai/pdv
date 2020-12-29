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
        $teste->nome = "teste";
        $teste->quantidade = 1;
        $teste->categoria_id = 1;
        $teste->marca_id = 1;
        //echo $teste->pesquisarPorNome("Valor");
        echo $teste->criarProduto($teste);
        //echo $teste->pesquisarPorId(1);
    ?>
</body>
</html>