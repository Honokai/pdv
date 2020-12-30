<?php 
$titulo = "PDV - Listagem de produtos";
# cabecalho com os scripts necessários
include 'templates/cabecalho.php';
# inclusao da navbar, somente navbar, pode ser que alguma pagina não utilize?
include 'templates/navbar.php';
# inclusao da classe que precisamos para recuperar as informações para preenchimento desta página
include "../modelos/produto.php";
$produtos = new Produto; # instancia a classe
# verifica se há na query string o atributo produto, se tiver, 
# joga no else para mostrar somente produtos associados a pesquisa informada
if(!isset($_GET['produto'])){
    $resultado = json_decode($produtos->tudo()); # o retorno da funcao é um json_encode
} else {
    $resultado = json_decode($produtos->pesquisarPorNome($_GET['produto'])); # o retorno da funcao é um json_encode
}
?>
<div class="flex-container">
    <div class="listagem">
    <?php
    foreach($resultado as $item) {
    ?>
        <div class="cartao-lista">
            <a href="/produtos?produto=<?= $item->id ?>">
                <div class="produto-nome">
                    <?= $item->nome ?>
                </div>
                <div class="produto-q">
                    <?= $item->quantidade ?>
                </div>
            </a>
        </div>
    <?php } ?>
    </div>
    <div class="lateral">
        <div>
            Filtros
        </div>
        <div>
            <form method="get" action="/produtos">
                <input class="input-pesquisa" placeholder="Buscar produto" name="produto" type="text">
                <button>buscar</button>
            </form>
        </div>
        <div>
        </div>
    </div>
</div>
<?php 
    include 'templates/rodape.php';
?>
