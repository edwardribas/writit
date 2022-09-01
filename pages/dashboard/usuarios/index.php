<?php
    include_once '../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));
    
    include_once '../../../utils/database.php';
    include_once '../../../utils/dados_usuario.php';
    include_once '../../../utils/dados_curriculo.php';

    $sql = "SELECT cpf, nome, email, tipo from usuarios";
    $stmt = $pdo->query($sql);
    $res = $stmt->execute();
    if (!$res) die('Ocorreu um erro na busca de usuários: ' . $stmt->errorInfo());
    $users = array();

    if ($stmt->rowCount() > 0) {
        $success = true;
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $success = false;
    }

    if ($tipo !== "3") exit(header('Location: http://localhost/writit/pages/dashboard'));
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
    <link rel="stylesheet" href="./usuarios.css">
    <link rel="stylesheet" href="../dashboard.css">
</head>
<body>
    <!-- Header -->
    <?php
        include_once('../../../components/sidebar.php');
    ?>

    <!-- Main -->
    <main>
        <h1 class="title">Usuários</h1>

        <div class="users">
            <table>
                <tr>
                    <td>CPF</td>
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Tipo</td>
                </tr>
                <?php
                    if ($success) {
                        foreach($users as $user) {
                            $tipo = $user['tipo'];
                            if ($tipo === "1") {
                                $tipoString = "Aluno";
                            } else if ($tipo === "2") {
                                $tipoString = "Empresa";
                            } else {
                                $tipoString = "Administrador";
                            }

                            echo "<tr>";
                            echo "<td>".$user['cpf']."</td>";
                            echo "<td>".$user['nome']."</td>";
                            echo "<td>".$user['email']."</td>";
                            echo "<td>".$tipoString."</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <?php
        include_once('../../../components/footer.php');
    ?>

    <!-- Application -->
</body>
</html>