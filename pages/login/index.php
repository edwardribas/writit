<?php
    include_once '../../utils/is_logged.php';
    if ($logado === true) exit(header('Location: ../dashboard'));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Metas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- General -->
    <title>Writit | Entrar</title>
    <link rel="shortcut icon" href="../../assets/img/logo.svg">

    <!-- Styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <main>
        <a href="../../."><img src="../../assets/img/logo-text.svg"></a>
        <form method="POST" action="./validation.php">
            <fieldset>
                <label for="email">E-mail</label>
                <input 
                    type="text" 
                    id="email" 
                    name="email"
                    autocomplete="off" 
                    spellcheck="false" 
                    placeholder="Digite seu e-mail" 
                    autofocus
                >
            </fieldset>
            <fieldset>
                <label for="password">Senha</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    autocomplete="off" 
                    placeholder="Digite sua senha">
            </fieldset>
            <a href="../cadastro">Ainda não possui uma conta?</a>
            <input type="submit" name="submit" value="Entrar">
        </form>
        <a class="btn" href="../../.">Voltar</a>
    </main>
</body>
</html>