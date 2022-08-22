<?php
    include_once '../../utils/is_logged.php';
    if ($logado === true) exit(header('Location: http://localhost/writit/pages/dashboard'));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Metas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- General -->
    <title>Writit | Cadastro</title>
    <link rel="shortcut icon" href="../../assets/img/logo.svg">

    <!-- Styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../login/login.css">
</head>
<body>
    <main>
        <a href="../../."><img src="../../assets/img/logo-text.svg"></a>
        <form method="POST" action="./validation.php">
            <fieldset>
                <label for="username">Usuário</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    autocomplete="off" 
                    spellcheck="false" 
                    placeholder="Digite seu usuário" 
                    autofocus
                >
            </fieldset>
            <fieldset>
                <label for="email">E-mail</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    autocomplete="off" 
                    spellcheck="false" 
                    placeholder="Digite seu e-mail" 
                >
            </fieldset>
            <fieldset>
                <label for="cpf">CPF</label>
                <input 
                    type="number"
                    id="cpf"
                    name="cpf" 
                    autocomplete="off" 
                    spellcheck="false" 
                    placeholder="Digite seu CPF" 
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
            <fieldset id="login_forma">
                <label>Cadastrar como</label>
                <fieldset>
                    <input type="radio" id="aluno" name="tipo" value="1"> 
                    <label for="aluno">Aluno</label>
                    <input type="radio" id="empresa" name="tipo" value="2">    
                    <label for="empresa">Empresa</label>
                </fieldset>
            </fieldset>
            <a href="../login">Já possui uma conta?</a>
            <input type="submit" value="Cadastrar">
        </form>
        <a class="btn" href="http://localhost/writit/pages/dashboard">Voltar</a>
    </main>
</body>
</html>