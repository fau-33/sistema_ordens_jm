<?php


class LoginController {
    
    public function exibirTela() {
        if (isset($_SESSION['id_user'])) {
            header("Location: index.php?rota=dashboard");
            exit;
        }
        
        
        $mensagem_erro = ""; 
        require_once 'app/Views/login.php';
    }

    public function fazerLogin() {
        
        $email = isset($_POST['email_usuario']) ? $_POST['email_usuario'] : '';
        $senha = isset($_POST['senha_usuario']) ? $_POST['senha_usuario'] : '';

        $modelUsuario = new Usuario();
        $usuarioEncontrado = $modelUsuario->validarLogin($email, $senha);

        if ($usuarioEncontrado) {
            
            $_SESSION['id_user'] = $usuarioEncontrado['id_user'];
            $_SESSION['nome_user'] = $usuarioEncontrado['name'];
            
           
            header("Location: index.php?rota=dashboard");
            exit;
        } else {
            
            $mensagem_erro = "Ops, Email ou Senha inválido";
            require_once 'app/Views/login.php';
        }
    }
}
?>