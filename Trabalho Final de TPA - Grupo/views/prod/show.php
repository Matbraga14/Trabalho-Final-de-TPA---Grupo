<?php
    include('login/protect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do produto</title>
</head>

<body>
    <h1>Detalhes do produto</h1>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($prod['id_produto'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($prod['nome'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Descrição:</strong> <?php echo htmlspecialchars($prod['descricao'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Preço:</strong> <?php echo htmlspecialchars($prod['preco'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Qtde estoque:</strong> <?php echo htmlspecialchars($prod['qtd_estoque'], ENT_QUOTES, 'UTF-8'); ?> </p>
    <p><strong>Categoria:</strong> <?php echo htmlspecialchars($prod['categoria'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Id Fornecedor:</strong> <?php echo htmlspecialchars($prod['fk_id_fornecedor'], ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <a href="index.php?action=adm">Voltar para lista de produtos</a>
</body>

</html>