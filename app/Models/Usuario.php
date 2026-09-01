<?php
// app/Models/Usuario.php

require_once __DIR__ . '/../../config/banco.php';

class Usuario {
    private $conexao;

    public function __construct() {
        $banco = new BancoDados();
        $this->conexao = $banco->conectar();
    }

    public function validarLogin($email_digitado, $senha_digitada) {
        
        $sql = "SELECT * FROM user WHERE email = :email AND password = :senha LIMIT 1";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':email' => $email_digitado,
            ':senha' => $senha_digitada
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>