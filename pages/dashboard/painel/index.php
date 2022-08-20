<?php
    include_once '../user_verify.php';
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
    <link rel="stylesheet" href="./painel.css">
    <link rel="stylesheet" href="../styles.css">
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
        <h1 class="title">Painel</h1>

        <div class="info_wrapper">
            <div class="user_info">
                <figure>
                    <img src="../../../assets/img/avatar.jpeg">
                    <span><?=$tipoUser?></span>
                </figure>
                <div>
                    <h3><?php echo ucfirst($nome); ?></h3>
                    <p><?=$email?></p>
                </div>
            </div>
        </div>


        <div class="<?php echo $tipo === '1' ? "curriculo" : "hidden"; ?>">
            <?php
                if ($stmt_curr->rowCount() === 0) {
                    echo "<p>Você ainda não possui um currículo cadastrado!</p>";
                    echo "<a href=\"../curriculo/cria_curriculo.php\">Criar</a>";
                } else {
                    echo "<p>Dados cadastrados<p>";
                    echo "
                        <div>
                            <p>Nome completo: $nomeCurriculo</p>
                            <p>Email: $emailCurriculo</p>
                            <p>Cidade: $cidade</p>
                            <p>Telefone: $telefone</p>
                        </div>
                    ";
                    echo "<a href=\"../curriculo\">Editar</a>";
                }
            ?>
        </div>
        
    </main>

    <!-- Footer -->
    <?php
        include_once('../../../components/footer.php');
    ?>

    <!-- Application -->
    <script src="../../../assets/app.js"></script>
</body>
</html>