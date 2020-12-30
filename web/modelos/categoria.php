<?php 
include '../configuracao/config.php';
class Categoria {
    public $nome;
    protected $config, $tabela = "categoria";

    public function __construct()
    {
        $this->config = new Configuracao;
        $this->config = $this->config->estabelecerConexao();
    }

    /**
     * Retorna todas as entradas de marcas existentes
     */
    public function tudo()
    {
        $consulta = "select * from {$this->tabela}";
        try {
            $conexao = $this->config;
            $retorno = $conexao->query($consulta);
            if($retorno != false) {
                $array = [];
                foreach($retorno as $resultado){
                    array_push($array, $resultado);
                }
                return json_encode($array);
            } else {
                return json_encode(["mensagem"=>"não foi encontrado nenhum registro", "retorno" => $retorno], JSON_UNESCAPED_UNICODE);
            }
        } catch (\mysqli $th) {
            return json_encode(["mensagem"=>$th->errno]);
        }
    }

    /**
     * @param string $nome
     * @return object mysqli
     */
    public function pesquisarPorNome(string $nome)
    {
        $consulta = "select * from {$this->tabela} where nome like '%{$nome}%'";
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
                return json_encode(["mensagem"=>"não foi encontrado nenhum registro", "retorno" => $retorno], JSON_UNESCAPED_UNICODE);
            }
        }
    }
}