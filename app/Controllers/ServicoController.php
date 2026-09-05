<?php


require_once 'app/Models/Servico.php';

class ServicoController {
    
   // Exibe a tela de cadastro de serviços, garantindo que o usuário esteja logado
    public function exibirTelaCadastro() {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?rota=login");
            exit;
        }
        require_once 'app/Views/cadastro_servico.php';
    }

    // Salva um novo serviço no banco de dados e redireciona para o dashboard
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
    
    // Finaliza um serviço, calcula a comissão e envia um e-mail de notificação
    public function finalizarServico() {
        
        $id_servico = $_GET['id'] ?? 0;

        if ($id_servico > 0) {
            $model = new Servico();
            
            $servico = $model->buscarPorId($id_servico);

            if ($servico) {
                $valor = $servico['price'];
                $comissao = 0;

                
                // Calcula a comissão conforme as regras de negócio:
                // - Até R$ 1.000,00: 5%
                // - Acima de R$ 1.000,00 e até R$ 10.000,00: 10%
                // - Acima de R$ 10.000,00: 20%
                if ($valor <= 1000) {
                    $comissao = $valor * 0.05;
                } elseif ($valor > 1000 && $valor <= 10000) {
                    $comissao = $valor * 0.10;
                } else {
                    $comissao = $valor * 0.20;
         }

                
                $model->finalizarServico($id_servico);

                
                $para = "admin@titan.com"; 
                $assunto = "Serviço Finalizado - Placa: " . $servico['car_plate'];
                
                $mensagem = "O serviço do cliente " . $servico['name_client'] . " foi finalizado.\n";
                $mensagem .= "Valor do Serviço: R$ " . number_format($valor, 2, ',', '.') . "\n";
                $mensagem .= "Comissão a pagar: R$ " . number_format($comissao, 2, ',', '.');
                
                $cabecalhos = "From: sistema@jminformatica.com";

                // Envia o e-mail de notificação
                @mail($para, $assunto, $mensagem, $cabecalhos);
            }
        }

        
        header("Location: index.php?rota=dashboard");
        exit;
    }
}
?>