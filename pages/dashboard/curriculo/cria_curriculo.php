<?php
    include_once '../user_verify.php';
    if ($stmt_curr->rowCount() === 1) Header('Location: ./');
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Metas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- General -->
    <title>Writit | Dashboard</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="./curriculo.css">
    <link rel="shortcut icon" href="../../../assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <!-- Header -->
    <?php
        include_once('../../../components/sidebar.php');
    ?>

    <!-- Main -->
    <main>
        <h1 class="title">Criar currículo</h1>

        <form method="POST" action="./valida_curriculo.php">
            <fieldset>
                <label for="telefone">Nome</label>
                <input 
                    type="text"
                    id="nome" 
                    name="nome" 
                    autocomplete="off" 
                    spellcheck="false" 
                    placeholder="Digite seu nome completo" 
                    autofocus
                >
            </fieldset>
            <fieldset>
                <label for="telefone">Telefone</label>
                <input 
                    type="number"
                    id="telefone" 
                    name="telefone" 
                    autocomplete="off" 
                    spellcheck="false" 
                    placeholder="Número de celular" 
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
                <label for="cpf">Cidade</label>
                <input 
                    type="text"
                    id="cidade"
                    name="cidade" 
                    autocomplete="off" 
                    spellcheck="false" 
                    placeholder="Digite sua cidade"
                >
            </fieldset>
            <input type="submit" value="Cadastrar currículo">
        </form>
    </main>

    <!-- Footer -->
    <?php
        include_once('../../../components/footer.php');
    ?>

    <!-- Application -->
    <script src="../../../assets/app.js"></script>
</body>
</html>