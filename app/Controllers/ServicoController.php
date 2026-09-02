<?php


require_once 'app/Models/Servico.php';

class ServicoController {
    
   
    public function exibirTelaCadastro() {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?rota=login");
            exit;
        }
        require_once 'app/Views/cadastro_servico.php';
    }

    
    public function salvarNovo() {
        
        $cliente = $_POST['cliente'] ?? '';
        $placa = $_POST['placa'] ?? '';
        $valor = $_POST['valor'] ?? '';

        
        $valor_formatado = str_replace(',', '.', $valor);

        
        $model = new Servico();
        $model->cadastrarServico($cliente, $placa, $valor_formatado);

        
        header("Location: index.php?rota=dashboard");
        exit;
    }
}
?>