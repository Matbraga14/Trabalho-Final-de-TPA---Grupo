<?php
    include('login/protect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criando novo Usuário</title>
</head>

<body>
    <h1>Criando novo Usuário</h1>
    <form action="index.php?action=create-prod" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" required>
        <br>
        <label for="preco">Preço:</label>
        <input type="text" id="preco" name="preco" required>
        <br>
        <label for="qtd_estoque">Quantidade Estoque:</label>
        <input type="text" id="qtd_estoque" name="qtd_estoque" required>
        <br>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" required>
        <br>
        <label for="fk_id_fornecedor">Id Fornecedor:</label>
        <input type="text" id="fk_id_fornecedor" name="fk_id_fornecedor" required>
        <br>
        <input type="submit" value="Create">
    </form>
    <a href="index.php?action=adm">Voltar para lista de produtos</a>
</body>

</html>