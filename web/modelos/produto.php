<?php

include __DIR__."\..\configuracao\config.php";

class Produto
{
    public $nome, $quantidade, $categoria_id, $marca_id;
    protected $tabela = "produtos", $config;

    public function __construct()
    {
        $this->config = new Configuracao;
        $this->config = $this->config->estabelecerConexao();
    }

    public function criarProduto(Produto $produto)
    {
        $consulta = "insert into {$this->tabela}".
        "(nome, quantidade, categoria_id, marca_id) ".
        "value (".
            " '{$produto->nome}', {$produto->quantidade}, {$produto->categoria_id}, {$produto->marca_id}".
        ")";
        try {
            $conexao = $this->config;
            $retorno = $conexao->query($consulta);
            if($retorno === false){
                return json_encode(["mensagem"=>$conexao->error]);
            } else {
                return $retorno;
            }
        } catch (\mysqli $th) {
            return json_encode($th->errno);
        }
    }

    /**
     * @param int $id
     * @return object:mysqli $produto
     */
    public function pesquisarPorId(int $id)
    {   
        $consulta = "select * from produtos where id={$id}";
        $conexao = $this->config;
        /* verifica se estabeleceu a conexao*/
        if(!$conexao){
            echo "Falhou" ;
            exit();
        } else {
            return json_encode($conexao->query($consulta));
        }
        
    }

    /**
     * @param string $nome
     * @return object mysqli
     */
    public function pesquisarPorNome(string $nome)
    {
        $consulta = "select * from produtos where nome = {$nome}";
        $conexao = $this->config;
        if(!$conexao){
            return json_encode(["mensagem"=>"Opa, a conexão falhou"]);
        } else {
            $retorno = $conexao->query($consulta);
            if($retorno != false) {
                $array = [];
                foreach($retorno as $resultado){
                    array_push($array, $resultado);
                }
                return json_encode($array);
            } else {
                header("Content-type:application/json;charset=utf-8");
                return json_encode(["mensagem"=>"não foi encontrado nenhum registro", "retorno" => $retorno], JSON_UNESCAPED_UNICODE);
            }
        }
    }

}