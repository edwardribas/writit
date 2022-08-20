<?php
    session_start();
    if (!$_SESSION['logged'] && !$_SESSION['cpf']) {
        session_unset();
        session_destroy();
        Header('Location: ../');
        exit;
    }

    include '../../../connection.php';
    
    if ($pdo) {
        $sql = "SELECT nome, tipo, email FROM usuarios WHERE cpf=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $_SESSION['cpf']);
        $res = $stmt->execute();
    
        if (!$res) {
            print_r($stmt->errorInfo());
            exit;
        };

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nome = $rows[0]['nome'];
        $tipo = $rows[0]['tipo'];
        $email = $rows[0]['email'];

        if ($tipo === "1") {
            $tipoUser = 'Aluno';
        } else if($tipo === "2") {
            $tipoUser = 'Empresa';
        } else {
            $tipoUser = 'Admin';
        };

        if ($tipo === "1") {
            $_sql = "SELECT telefone, cidade FROM curriculo WHERE cpf_user=?";
            $stmt = $pdo->prepare($_sql);
            $stmt->bindParam(1, $_SESSION['cpf']);
            $_res = $stmt->execute();
    
            if (!$_res) {
                print_r($stmt->errorInfo());
                exit;
            }
    
            $possuiCurriculo = $stmt->rowCount() === 0;
            if ($stmt->rowCount() === 1) {
                $_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $telefone = $_rows[0]['telefone'];
                $cidade = $_rows[0]['cidade'];
            }
        }
    }

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

        <div class="curriculo">
            <?php
                if ($possuiCurriculo) {
                    echo "<p>Você ainda não possui um currículo cadastrado!</p>";
                    echo "<a>Criar</a>";
                } else {
                    echo "<p>Dados cadastrados<p>";
                    echo "
                        <div>
                            <p>Email: $email</p>
                            <p>Cidade: $cidade</p>
                            <p>Telefone: $telefone</p>
                        </div>
                    ";
                    echo "<a>Editar</a>";
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