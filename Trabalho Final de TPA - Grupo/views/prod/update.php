<?php
    include('login/protect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizando Produto</title>
</head>

<body>
    <h1>Atualizando Produto</h1>
    <form action="index.php?action=update-prod&id_produto=<?php echo $prod['id_produto']; ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"
            value="<?php echo htmlspecialchars($prod['nome'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao"
            value="<?php echo htmlspecialchars($prod['descricao'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="preco">Preço:</label>
        <input type="text" id="preco" name="preco"
            value="<?php echo htmlspecialchars($prod['preco'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="qtd_estoque">Qtde_estoque:</label>
        <input type="text" id="qtd_estoque" name="qtd_estoque"
            value="<?php echo htmlspecialchars($prod['qtd_estoque'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="categoria">categoria:</label>
        <input type="text" id="categoria" name="categoria"
            value="<?php echo htmlspecialchars($prod['categoria'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="fk_id_fornecedor">fk_id_fornecedor:</label>
        <input type="text" id="fk_id_fornecedor" name="fk_id_fornecedor"
            value="<?php echo htmlspecialchars($prod['fk_id_fornecedor'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php?action=adm">Voltar para lista de usuários</a>
</body>

</html>