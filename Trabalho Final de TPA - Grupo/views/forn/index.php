<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wid_fornecedorth=device-wid_fornecedorth, initial-scale=1.0">
    <title>Lista de Fornecedores</title>
    <style>
    table {
        wid_fornecedorth: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid_fornecedor black;
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
    <h1>Lista de Fornecedores</h1>
    <?php 
        if(isset($_SESSION)) {
    ?>
    <a href="index.php?action=create-forn">Criar novo Fornecedor</a>
    <?php
        }
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereço</th>
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
            <?php foreach ($forns as $forn): ?>
            <tr>
                <td><?php echo htmlspecialchars($forn['id_fornecedor'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($forn['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($forn['telefone'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($forn['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($forn['endereco'], ENT_QUOTES, 'UTF-8'); ?></td>
                <?php 
                    if(isset($_SESSION)) {
                ?>
                <td>
                    <a href="index.php?action=read-forn&id_fornecedor=<?php echo $forn['id_fornecedor']; ?>">Ver</a>
                    <a
                        href="index.php?action=update-forn&id_fornecedor=<?php echo $forn['id_fornecedor']; ?>">Editar</a>
                    <a
                        href="index.php?action=delete-forn&id_fornecedor=<?php echo $forn['id_fornecedor']; ?>">Apagar</a>
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