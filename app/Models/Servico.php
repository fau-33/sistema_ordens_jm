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
   public function cadastrarServico($nome_cliente, $placa, $valor) {
    $db = new BancoDados();
    $conexao = $db->conectar();

    
    $data_agora = date('Y-m-d H:i:s'); 

    
    $sql = "INSERT INTO service (name_client, car_plate, price, date, status) 
            VALUES (:nome, :placa, :valor, :data_servico, 'Pendente')";
    
    $comando = $conexao->prepare($sql);
    $comando->bindValue(':nome', $nome_cliente);
    $comando->bindValue(':placa', $placa);
    $comando->bindValue(':valor', $valor);
    $comando->bindValue(':data_servico', $data_agora);
    
    $comando->execute();
}

}
?>