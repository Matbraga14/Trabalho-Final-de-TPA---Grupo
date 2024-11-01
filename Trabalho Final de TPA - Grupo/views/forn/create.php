<?php
    include('login/protect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criando novo Fornecedor</title>
</head>

<body>
    <h1>Criando novo Fornecedor</h1>
    <form action="index.php?action=create-forn" method="post">
        <label for="name">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="name">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="name">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>
        <br>
        <input type="submit" value="Create">
    </form>
    <a href="index.php?action=adm">Voltar para lista de fornecedors</a>
</body>

</html>