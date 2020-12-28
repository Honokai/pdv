<?php

class Configuracao {
    protected $banco = 'pdv';
    protected $host = "127.0.0.1";
    protected $port = "3306";
    protected $usuario = "root";
    protected $senha = "865358";

    public function estabelecerConexao() {
        return new mysqli($this->host, $this->usuario, 
            $this->senha, $this->banco, 
            $this->port
        );
    }
}
