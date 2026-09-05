<?php


require_once __DIR__ . '/../../config/banco.php';

class Servico {
    
    // Função responsável por listar todos os serviços cadastrados no banco de dados
    public function listarTodos() {
        $db = new BancoDados();
        $conexao = $db->conectar();

        
        $sql = "SELECT * FROM service ORDER BY id_service DESC";
        $comando = $conexao->query($sql);
        
        
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }
    // Função responsável por cadastrar um novo serviço no banco com status inicial 'Pendente'
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

// Função responsável por buscar um serviço específico pelo ID
  public function buscarPorId($id) {
        $db = new BancoDados();
        $conexao = $db->conectar();

        $sql = "SELECT * FROM service WHERE id_service = :id LIMIT 1";
        $comando = $conexao->prepare($sql);
        $comando->bindValue(':id', $id);
        $comando->execute();
        
        return $comando->fetch(PDO::FETCH_ASSOC);
    }
   // Atualiza o status do serviço para 'Finalizado' baseado no ID informado
    public function finalizarServico($id) {
        $db = new BancoDados();
        $conexao = $db->conectar();

        $sql = "UPDATE service SET status = 'Finalizado' WHERE id_service = :id";
        $comando = $conexao->prepare($sql);
        $comando->bindValue(':id', $id);
        $comando->execute();
    }

}
?>