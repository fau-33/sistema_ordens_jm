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

        
        $valor_final = str_replace(',', '.', $valor);

        
        $model = new Servico();
        $model->cadastrarServico($cliente, $placa, $valor_final);

        
        header("Location: index.php?rota=dashboard");
        exit;
    }
    
    public function finalizarServico() {
        
        $id_servico = $_GET['id'] ?? 0;

        if ($id_servico > 0) {
            $model = new Servico();
            
            $servico = $model->buscarPorId($id_servico);

            if ($servico) {
                $valor = $servico['price'];
                $comissao = 0;

                
                if ($valor <= 500) {
                    $comissao = $valor * 0.05; // 5%
                } elseif ($valor > 500 && $valor <= 1500) {
                    $comissao = $valor * 0.10; // 10%
                } else {
                    $comissao = $valor * 0.20; // 20%
                }

                
                $model->finalizarServico($id_servico);

                
                $para = "admin@titan.com"; 
                $assunto = "Serviço Finalizado - Placa: " . $servico['car_plate'];
                
                $mensagem = "O serviço do cliente " . $servico['name_client'] . " foi finalizado.\n";
                $mensagem .= "Valor do Serviço: R$ " . number_format($valor, 2, ',', '.') . "\n";
                $mensagem .= "Comissão a pagar: R$ " . number_format($comissao, 2, ',', '.');
                
                $cabecalhos = "From: sistema@jminformatica.com";

                
                @mail($para, $assunto, $mensagem, $cabecalhos);
            }
        }

        
        header("Location: index.php?rota=dashboard");
        exit;
    }
}
?>