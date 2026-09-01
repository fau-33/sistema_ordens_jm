<?php


class LoginController {
    
    
    public function exibirTela() {
        
        if (isset($_SESSION['id_user'])) {
            header("Location: index.php?rota=dashboard");
            exit;
        }
        
        
        require_once 'app/Views/login.php';
    }

    public function fazerLogin() {
        
        echo "Lógica de verificar email e senha vem aqui.";
    }
}
?>