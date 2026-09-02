<?php


require_once __DIR__ . '/../../config/banco.php';

class Usuario {
    
    
    public function checarLogin($email, $senha) {
        $db = new BancoDados();
        $conexao = $db->conectar();

        
        $sql = "SELECT * FROM user WHERE email = :e AND password = :s LIMIT 1";
        
        $comando = $conexao->prepare($sql);
        $comando->bindValue(':e', $email);
        $comando->bindValue(':s', $senha);
        $comando->execute();

        $dados = $comando->fetch(PDO::FETCH_ASSOC);

        
        if ($dados) {
            return $dados;
        } else {
            return false;
        }
    }
}
?>