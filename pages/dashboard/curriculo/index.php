<?php
    include_once '../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));

    include_once '../../../utils/database.php';
    include_once '../../../utils/dados_usuario.php';
    include_once '../../../utils/dados_curriculo.php';
    if ($stmt_curr->rowCount() === 0) Header('Location: http://localhost/writit/pages/dashboard/curriculo/novow');
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
    <link rel="shortcut icon" href="../../../assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Styles -->
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../dashboard.css">
    <link rel="stylesheet" href="./curriculo.css">
</head>
<body>
    <!-- Header -->
    <?php
        include_once('../../../components/sidebar.php');
    ?>
    

    <!-- Main -->
    <main>
        <h1 class="title">Currículo</h1>

        <div>
            <p>Página disponível em breve.</p>
        </div>
    </main>

    <!-- Footer -->
    <?php
        include_once('../../../components/footer.php');
    ?>

    <!-- Application -->
</body>
</html>