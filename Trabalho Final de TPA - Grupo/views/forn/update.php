<?php
    include('login/protect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizando Fornecedor</title>
</head>

<body>
    <h1>Atualizando Fornecedor</h1>
    <form action="index.php?action=update-forn&id_fornecedor=<?php echo $forn['id_fornecedor']; ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"
            value="<?php echo htmlspecialchars($forn['nome'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone"
            value="<?php echo htmlspecialchars($forn['telefone'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"
            value="<?php echo htmlspecialchars($forn['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco"
            value="<?php echo htmlspecialchars($forn['endereco'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php?action=adm">Voltar para lista de fornecedores</a>
</body>

</html>