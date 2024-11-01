<?php
    include('login/protect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes de fornecedor</title>
</head>

<body>
    <h1>Detalhes de fornecedor</h1>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($forn['id_fornecedor'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($forn['nome'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Telefone:</strong> <?php echo htmlspecialchars($forn['telefone'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($forn['email'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Endereço:</strong> <?php echo htmlspecialchars($forn['endereco'], ENT_QUOTES, 'UTF-8'); ?></p>
    <a href="index.php?action=adm">Voltar para lista de fornecedores</a>
</body>

</html>