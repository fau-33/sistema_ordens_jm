<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel - JM Informática</title>
    
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; }
        .cabecalho { background-color: #333; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .conteudo { background: white; padding: 20px; margin: 20px 30px; border: 1px solid #ccc; min-height: 400px; }
        .btn-sair { color: #fff; text-decoration: none; background: #d9534f; padding: 8px 15px; border-radius: 4px; }
    </style>
</head>
<body>

    <div class="cabecalho">
        <div>
            
            <strong>Painel JM Informática</strong> | Bem-vindo, <?php echo $nome_usuario; ?>
        </div>
        <div>
            <a href="index.php?rota=sair" class="btn-sair">Sair</a>
        </div>
    </div>

    <div class="conteudo">
        <h2>Lista de Serviços</h2>
        <hr>
        <p>Aqui nós vamos colocar a tabela com as ordens de serviço daqui a pouco!</p>
    </div>

</body>
</html>