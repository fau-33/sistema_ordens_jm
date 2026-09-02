<?php


require_once __DIR__ . '/../../config/banco.php';

class Servico {
    
    
    public function listarTodos() {
        $db = new BancoDados();
        $conexao = $db->conectar();

        
        $sql = "SELECT * FROM service ORDER BY id_service DESC";
        $comando = $conexao->query($sql);
        
        
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>