<?php


class DashboardController {
    
    public function abrirPainel() {
        
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?rota=login");
            exit;
        }

        
        $nome_usuario = $_SESSION['usuario_nome'];

        
        require_once 'app/Views/dashboard.php';
    }
}
?>