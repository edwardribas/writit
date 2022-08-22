<?php
    include_once '../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));

    include_once '../../../utils/database.php';
    include_once '../../../utils/dados_usuario.php';
    include_once '../../../utils/dados_curriculo.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Metas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- General -->
    <title>Writit | Configurações</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Styles -->
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="./config.css">
    <link rel="stylesheet" href="../dashboard.css">
</head>
<body>
    <!-- Header -->
    <?php
        include_once('../../../components/sidebar.php');
    ?>

    <!-- Main -->
    <main>
        <h1 class="title">Configurações</h1>

        <div>
            <div class="default">
                <a href="#">Editar</a>
                <span>Alterar o nome de seu usuário.</span>
            </div>
            <div class="default">
                <a href="#">Editar</a>
                <span>Alterar o seu endereço de e-mail.</span>
            </div>
            <div class="default">
                <a href="#">Editar</a>
                <span>Editar a senha da sua conta.</span>
            </div>
        <?php if($stmt_curr->rowCount() === 1) {?>
            <div>
                <a href="./handleDeletes/excluir_curriculo.php" class="exclude">Excluir</a>
                <span>Excluir todos os dados do currículo.<span>
            </div>
        <?php }?>
            <div class="exclude">
                <a href="./handleDeletes/excluir_conta.php" class="exclude">Excluir</a>
                <span>Tenha certeza que deseja fazer isso, pois esta ação é irreversível!<span>
            </div>
        </div>
        
    </main>

    <!-- Footer -->
    <?php
        include_once('../../../components/footer.php');
    ?>

    <!-- Application -->
</body>
</html>