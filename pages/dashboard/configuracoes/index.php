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
            <?php if($stmt_curr->rowCount() === 1) {?>
                <div class="config exclude">
                    <button>Excluir</button>
                    <div class="confirmation">
                        <a href="./deletar/curriculo.php">Confirmar</a>
                        <button>Cancelar</button>
                    </div>
                    <span>Excluir todos os dados do currículo.<span>
                </div>
            <?php }?>

            <div class="config exclude">                    
                <button>Excluir</button>
                <div class="confirmation">
                    <a href="./deletar/conta.php">Confirmar</a>
                    <button>Cancelar</button>
                </div>
                <span>Tenha certeza que deseja fazer isso, pois esta ação é irreversível!<span>
            </div>
        </div>
        
    </main>

    <!-- Footer -->
    <?php
        include_once('../../../components/footer.php');
    ?>

    <!-- Application -->
    <script src="./app.js"></script>
</body>
</html>