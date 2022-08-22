<?php
    include '../../../../utils/is_logged.php';
    include '../../../../utils/database.php';
    include '../../../../utils/dados_curriculo.php';

    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));
    if ($stmt_curr->rowCount() > 0) exit(header('Location: http://localhost/writit/pages/dashboard/curriculo'));

    $nome = $_POST['nome'];
    $telefone = strval($_POST['telefone']);
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $foto = $_FILES['imagem'];

    if (
        isset($nome) && isset($telefone) && isset($email) && isset($cidade) && isset($foto) &&
        !empty($nome) && !empty($telefone) && !empty($email) && !empty($cidade) && 
        $foto['type'] === "image/png" || $foto['type'] === "image/jpeg" || $foto['type'] === "image/jpeg" && $foto['size'] < 16000000
    ){
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
        header('Location: http://localhost/writit/pages/dashboard/curriculo');
    }
    header('Location: http://localhost/writit/pages/dashboard/curriculo/novo');
?>