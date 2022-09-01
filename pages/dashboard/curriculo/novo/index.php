<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));

    include_once '../../../../utils/database.php';
    include_once '../../../../utils/dados_usuario.php';
    include_once '../../../../utils/dados_curriculo.php';
    if ($stmt_curr->rowCount() === 1) Header('Location: http://localhost/writit/pages/dashboard/curriculo');
    if ($tipo != 1) Header('Location: http://localhost/writit/pages/dashboard/');
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
    <link rel="shortcut icon" href="../../../../assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Styles -->
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <link rel="stylesheet" href="../../dashboard.css">
    <link rel="stylesheet" href="../curriculo.css">
</head>
<body>
    <!-- Header -->
    <?php
        include_once('../../../../components/sidebar.php');
    ?>

    <!-- Main -->
    <main>
        <h1 class="title">Criar currículo</h1>

        <form method="POST" action="./validation.php" enctype="multipart/form-data">
            <fieldset>
                <label for="telefone">Nome completo</label>
                <input 
                    type="text"
                    id="nome" 
                    name="nome" 
                    autocomplete="off" 
                    spellcheck="false" 
                    placeholder="Digite o seu nome completo" 
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
            <fieldset class="img">
                <label>Foto</label>
                <fieldset>
                    <img>
                    <label for="imagem">Enviar imagem</label>
                    <input type="file" id="imagem" name="imagem" accept="image/png, image/jpeg, image/jpg">
                </fieldset>
            </fieldset>
            <input type="submit" value="Cadastrar currículo" name="submit">
        </form>
    </main>

    <!-- Footer -->
    <?php
        include_once('../../../../components/footer.php');
    ?>

    <!-- Application -->
    <script src="./curriculo.js"></script>
</body>
</html>