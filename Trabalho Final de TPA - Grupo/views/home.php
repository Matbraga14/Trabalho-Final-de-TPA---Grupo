<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .container {
        margin-left: 0;
        display: flex;
        flex-direction: row;
    }

    .btn {
        border: solid 2px;
        margin: 20px;
        background-color: lightgray;
    }

    .btn:hover {
        transition: 0.4s;
        color: purple;

    }

    nav {
        height: 770px;
    }

    footer {
        display: flex;
        flex-direction: row;
    }




    .socialbar {
        height: fit-content;
        background-color: #191919;
        border-radius: 3em;
        width: 170px;
        padding: 14px;
        margin: 15px;
        color: white;
        /* box-shadow: 3px 3px 15px rgb(0, 0, 0),
            -3px -3px 15px rgb(58, 58, 58); */
    }

    .card,
    center {
        border: 0;
        display: flex;
        flex-direction: row;
    }

    .card a {
        transition: 0.4s;
        color: white;
        text-decoration: none;
    }

    #github:hover {
        color: #c9510c;
    }
    </style>
</head>

<body>
    <h1>Bem vindo ao sistema</h1>
    <nav>
        <div class="container">
            <p><a href="../index.php?action=user" type="button" class="btn">Usuário</a></p>
            <p><a href="../login/login.php" type="button" class="btn">Administrador</a></p>
        </div>
    </nav>
    <footer>
        <div class="card">
            <center>
                <div class="socialbar">
                    <a id="github" href="https://github.com/arthurfrigo" height="16">Arthur Frigo</a>

                </div>
                <div class="socialbar">
                    <a id="github" href="https://github.com/Henrique678" height="16">Henrique Silveira</a>

                </div>
                <div class="socialbar">
                    <a id="github" href="https://github.com/Louissszx" height="16">Luis Felipe</a>

                </div>
                <div class="socialbar">
                    <a id="github" href="https://github.com/Matbraga14" height="16">Matheus Guimarães</a>

                </div>
        </div>
    </footer>
</body>

</html>