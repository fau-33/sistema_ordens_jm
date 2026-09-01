
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Controle de Serviços - Login</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .caixa-login { width: 400px; margin: 100px auto; background: #fff; padding: 30px; border: 1px solid #ccc; }
        .campo { width: 95%; padding: 10px; margin-bottom: 20px; font-size: 16px; }
        .btn-entrar { background-color: #333; color: white; padding: 10px 30px; border: none; cursor: pointer; font-size: 16px;}
        .link-cadastro { text-decoration: none; color: #0066cc; float: right; margin-top: 10px;}
    </style>
</head>
<body>

    <div class="caixa-login">
        <h2 style="text-align: center; margin-bottom: 30px;">Sistema de Controle de Serviços</h2>
        
        
        <?php if(isset($mensagem_erro) && $mensagem_erro != "") { ?>
            <div style="background-color: #ffcccc; color: red; padding: 10px; margin-bottom: 15px; border: 1px solid red; text-align: center;">
                <?php echo $mensagem_erro; ?>
            </div>
        <?php } ?>
        
        
        <form action="index.php?rota=logar" method="POST">
        
    
        <form action="index.php?rota=logar" method="POST">
            
            <input type="email" name="email_usuario" class="campo" placeholder="email@email.com" required>
            
            <input type="password" name="senha_usuario" class="campo" placeholder="********" required>
            
            <div>
                <button type="submit" class="btn-entrar">Entrar</button>
                <a href="index.php?rota=cadastro_usuario" class="link-cadastro">Cadastrar usuário</a>
            </div>

        </form>
    </div>

</body>
</html>