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

        <a href="index.php?rota=novo_servico" style="background: #5cb85c; color: white; padding: 8px 15px; text-decoration: none;">+ Novo Serviço</a>
        
        <hr>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;" border="1">
            <tr style="background-color: #eee; text-align: left;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Cliente</th>
                <th style="padding: 10px;">Placa</th>
                <th style="padding: 10px;">Valor (R$)</th>
                <th style="padding: 10px;">Data</th>
                <th style="padding: 10px;">Ações</th>
            </tr>
            
            <?php 
            
            if (empty($lista_servicos)) {
                echo "<tr><td colspan='6' style='padding: 10px; text-align: center;'>Nenhum serviço cadastrado ainda.</td></tr>";
            } else {
                
                foreach ($lista_servicos as $servico) {
            ?>
                <tr>
                    <td style="padding: 10px;"><?php echo $servico['id_service']; ?></td>
                    <td style="padding: 10px;"><?php echo $servico['name_client']; ?></td>
                    <td style="padding: 10px;"><?php echo $servico['car_plate']; ?></td>
                    <td style="padding: 10px;"><?php echo number_format($servico['price'], 2, ',', '.'); ?></td>
                    <td style="padding: 10px;"><?php echo date('d/m/Y', strtotime($servico['date'])); ?></td>
                    <td style="padding: 10px;">
                        
                        <button>Finalizar</button>
                    </td>
                </tr>
            <?php 
                }
            } 
            ?>
        </table>
    </div>

</body>
</html>