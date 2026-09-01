<?php


class BancoDados {
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $nome_banco = "jm_servicos"; 

    public $conexao;

    public function conectar() {
        $this->conexao = null;

        try {
            
            $string_conexao = "mysql:host=" . $this->host . ";dbname=" . $this->nome_banco . ";charset=utf8";
            
            $this->conexao = new PDO($string_conexao, $this->usuario, $this->senha);
            
            
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $erro) {
            
            echo "Ops! Erro ao conectar no banco: " . $erro->getMessage();
        }

        return $this->conexao;
    }
}
?>