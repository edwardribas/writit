<?php
    include '../../../../utils/is_logged.php';
    include '../../../../utils/database.php';
    include '../../../../utils/dados_curriculo.php';

    if ($logado === false) exit(header('Location: ../../../'));

    // Verificar se o usuário já possui um currículo
    if ($stmt_curr->rowCount() > 0) exit(header('Location: ../'));

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $telefone = strval($_POST['telefone']);
        $email = $_POST['email'];
        $cidade = $_POST['cidade'];
        $foto = $_FILES['imagem'];

        if (isset($foto) && isset($nome) && isset($telefone) && isset($email) && isset($cidade) && 
        !empty($foto) && !empty($nome) !empty($telefone) && !empty($email) && !empty($cidade) && 
        $foto['type'] === "image/png" || $foto['type'] === "image/jpeg" || $foto['type'] === "image/jpeg" &&
        $foto['size'] < 16000000) {
            
                // // Criação do currículo
            $imagem = $foto['tmp_name'];
            $imgContent = base64_encode(file_get_contents($imagem));

            $sql = "INSERT INTO curriculo (telefone, cidade, email, cpf_user, nome, foto) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $telefone);
            $stmt->bindParam(2, $cidade);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $_SESSION['cpf']);
            $stmt->bindParam(5, $nome);
            $stmt->bindParam(6, $imgContent);
            $res = $stmt->execute();

            if (!$res) die($stmt->errorInfo());
            header('Location: ../');
        }
    }
    header('Location: ./');
?>