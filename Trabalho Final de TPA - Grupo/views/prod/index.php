<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <h1>Lista de Produtos</h1>
    <?php 
        if(isset($_SESSION)) {
    ?>
    <a href="index.php?action=create-prod">Criar novo Produto</a>
    <?php
        }
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Qtd Estoque</th>
                <th>Categoria</th>
                <th>Id Fornecedor</th>
                <?php 
                    if(isset($_SESSION)) {
                ?>
                <th>Ações</th>
                <?php
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prods as $prod): ?>
            <tr>
                <td><?php echo htmlspecialchars($prod['id_produto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($prod['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($prod['descricao'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($prod['preco'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($prod['qtd_estoque'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($prod['categoria'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($prod['fk_id_fornecedor'], ENT_QUOTES, 'UTF-8'); ?></td>
                <?php 
                    if(isset($_SESSION)) {
                ?>
                <td>
                    <a href="index.php?action=read-prod&id_produto=<?php echo $prod['id_produto']; ?>">Ver</a>
                    <a href="index.php?action=update-prod&id_produto=<?php echo $prod['id_produto']; ?>">Editar</a>
                    <a href="index.php?action=delete-prod&id_produto=<?php echo $prod['id_produto']; ?>">Apagar</a>
                </td>
                <?php
                    }
                ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>