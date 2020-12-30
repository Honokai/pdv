<?php 
$titulo = "PDV - Categorias";
include '../modelos/categoria.php';
include 'templates/cabecalho.php';
include 'templates/navbar.php';
$categoria = new Categoria;
if(!isset($_GET['categoria'])){
    $resultado = json_decode($categoria->tudo()); # o retorno da funcao é um json_encode
} else {
    $resultado = json_decode($categoria->pesquisarPorNome($_GET['produto'])); # o retorno da funcao é um json_encode
}
foreach($resultado as $item){
?>
<div>
    <?= $item->nome ?>
</div>
<?php
}
include 'templates/rodape.php';