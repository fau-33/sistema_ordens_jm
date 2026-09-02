<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Serviço</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .caixa { background: #fff; padding: 20px; max-width: 500px; margin: 0 auto; border: 1px solid #ccc; }
        .campo { width: 95%; padding: 8px; margin-bottom: 15px; }
        .btn { background: #333; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="caixa">
        <h2>Cadastrar Novo Serviço</h2>
        
        
        <form action="index.php?rota=salvar_servico" method="POST">
            <label>Nome do Cliente:</label><br>
            <input type="text" name="cliente" class="campo" required><br>

            <label>Placa do Veículo:</label><br>
            <input type="text" name="placa" class="campo" placeholder="ABC-1234" required><br>

            <label>Valor do Serviço (R$):</label><br>
            <input type="text" name="valor" class="campo" placeholder="Ex: 150.00" required><br>

            <button type="submit" class="btn">Salvar Serviço</button>
            <a href="index.php?rota=dashboard" style="margin-left: 15px;">Cancelar</a>
        </form>
    </div>
</body>
</html>