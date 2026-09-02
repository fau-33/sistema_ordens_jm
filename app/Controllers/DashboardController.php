<?php



require_once 'app/Models/Servico.php';

class DashboardController {
    
    public function abrirPainel() {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?rota=login");
            exit;
        }

        $nome_usuario = $_SESSION['usuario_nome'];

        
        $modelServico = new Servico();
        $lista_servicos = $modelServico->listarTodos();

        
        require_once 'app/Views/dashboard.php';
    }
}
?>