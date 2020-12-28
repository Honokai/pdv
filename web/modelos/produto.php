<?php

include __DIR__."\..\configuracao\config.php";

class Produto
{
    protected $nome, $quantidade, $categoria_id, $marca_id;

    /**
     * @param integer $id
     * @return mysqli
     */
    public function pesquisarPorId($id)
    {   
        $config = new Configuracao;
        $consulta = "select * from produtos where id={$id}";
        $conexao = $config->estabelecerConexao();
        if($conexao->connect_errno){
            echo "Falhou" ;
            exit();
        } else {
            echo "<h1>legal</h1>";
        }
        
    }

    /**
     * @param string $nome
     * @return object mysqli
     */
    public function pesquisarPorNome($nome)
    {

    }

}