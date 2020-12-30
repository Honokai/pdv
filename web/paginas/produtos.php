<?php 
$titulo = "PDV - Listagem de produtos";
# cabecalho com os scripts necessários
include 'templates/cabecalho.php';
# inclusao da navbar, somente navbar, pode ser que alguma pagina não utilize?
include 'templates/navbar.php';
# inclusao da classe que precisamos para recuperar as informações para preenchimento desta página
include "../modelos/produto.php";
$produtos = new Produto; # instancia a classe
(array)$resultado = json_decode($produtos->pesquisarPorNome("teste")); 
foreach($resultado as $item) {
?>
    <div>
        <a href=""> <?= $item->nome ?> </a>
    </div>

<?php } 
    include 'templates/rodape.php';
?>
