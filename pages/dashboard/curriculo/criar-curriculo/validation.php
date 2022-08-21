<?php
    session_start();

    // Conexão
    include '../../../../connection.php';

    // Verificar se o usuário já possui um currículo
    $sql = "SELECT cpf_user FROM curriculo WHERE cpf_user=?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $_SESSION['cpf']);
    $res = $sth->execute();

    if (!$res) {
        print_r($sth->errorInfo());
        exit;
    }
    if ($sth->rowCount() > 0) {
        Header('Location: ../');
        exit;
    }

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $telefone = strval($_POST['telefone']);
        $email = $_POST['email'];
        $cidade = $_POST['cidade'];
        $foto = $_FILES['imagem'];

        if (
            !empty($foto) && 
            $foto['type'] === "image/png" || 
            $foto['type'] === "image/jpeg" || 
            $foto['type'] === "image/jpeg" &&
            $foto['size'] < 16000000
        ) {
            // // Criação do currículo
            $imagem = $foto['tmp_name'];
            $imgContent = base64_encode(file_get_contents($imagem));

            $sql = "INSERT INTO curriculo (telefone, cidade, email, cpf_user, nome, foto) VALUES (?, ?, ?, ?, ?, ?)";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $telefone);
            $sth->bindParam(2, $cidade);
            $sth->bindParam(3, $email);
            $sth->bindParam(4, $_SESSION['cpf']);
            $sth->bindParam(5, $nome);
            $sth->bindParam(6, $imgContent);
            $res = $sth->execute();

            if (!$res) {
                print_r($sth->errorInfo());
                exit;
            }

            Header('Location: ../');
        }
    }
    Header('Location: ./');
?>