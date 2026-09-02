<?php


class LoginController {
    
    public function exibirTela() {
        
        if (isset($_SESSION['usuario_id'])) {
            header("Location: index.php?rota=dashboard");
            exit;
        }
        
        $erro_msg = "";
        require_once 'app/Views/login.php';
    }

    public function fazerLogin() {
        
        $email_informado = $_POST['email_usuario'] ?? '';
        $senha_informada = $_POST['senha_usuario'] ?? '';

       
        if (empty($email_informado) || empty($senha_informada)) {
            $erro_msg = "Ops, Email ou Senha inválido";
            require_once 'app/Views/login.php';
            return;
        }

        
        $userModel = new Usuario();
        $usuario = $userModel->checarLogin($email_informado, $senha_informada);

        if ($usuario) {
            
            $_SESSION['usuario_id'] = $usuario['id_user'];
            $_SESSION['usuario_nome'] = $usuario['name'];
            
            
            header("Location: index.php?rota=dashboard");
            exit;
        } else {
            
            $erro_msg = "Ops, Email ou Senha inválido";
            require_once 'app/Views/login.php';
        }
    }
}
?>