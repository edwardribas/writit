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
    <title>Writit | Dashboard</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <!-- Styles -->
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="./painel.css">
    <link rel="stylesheet" href="../dashboard.css">
</head>
<body>
    <!-- Header -->
    <?php
        include_once('../../../components/sidebar.php');
    ?>

    <!-- Main -->
    <main>
        <h1 class="title">Painel</h1>
        <div class="info_wrapper">
            <div class="user_info">
                <figure>
                    <?php
                        if ($stmt_curr->rowCount() === 1) {
                            echo "<img src=\"data:image/png;base64,$curr_foto\">";
                        } else {
                            echo "<img src=\"http://localhost/writit/assets/img/avatar.svg\">";
                        }
                    ?>
                    <span><?=$tipoStr?></span>
                </figure>
                <div>
                    <h3><?php echo ucfirst($nome); ?></h3>
                    <p><?=$email?></p>
                </div>
            </div>
        </div>

        <?php
            if ($tipo === "1") {
        ?>
            <div class="curriculo">
                <?php
                    if ($stmt_curr->rowCount() === 0) {
                ?>
                    <p>Você ainda não possui um currículo cadastrado!</p>
                    <a href="http://localhost/writit/pages/dashboard/curriculo/novo">Criar</a>
                <?php
                    } else {
                ?>
                    <p>Seu currículo<p>
                    <div class="curr_dados">
                        <p aria-label="Nome completo">
                            <span><i class="fa-solid fa-user"></i></span> 
                            <?=$curr_nome?>
                        </p>
                        <p aria-label="Email">
                            <span><i class="fa-solid fa-envelope"></i></span> 
                            <?=$curr_email?>
                        </p>
                        <p aria-label="Cidade">
                            <span><i class="fa-solid fa-city"></i></span> 
                            <?=$curr_cidade?>
                        </p>
                        <p aria-label="Telefone">
                            <span><i class="fa-solid fa-phone"></i></span> 
                            <?=$curr_telefone?>
                        </p>
                    </div>
                    <a href="http://localhost/writit/pages/dashboard/curriculo">Acessar</a>
                <?php
                    }
                ?>
            </div>
        <?php
            }
        ?>
    </main>

    <!-- Footer -->
    <?php
        include_once('../../../components/footer.php');
    ?>

    <!-- Application -->
</body>
</html>