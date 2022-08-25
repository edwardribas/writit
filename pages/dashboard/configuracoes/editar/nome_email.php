<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));
    include_once '../../../../utils/database.php';

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);

    if (isset($nome) && !empty($nome) && isset($email) && !empty($email)) {
        $sql = "SELECT cpf FROM usuarios WHERE cpf <> ? AND email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $_SESSION['cpf']);
        $stmt->bindParam(2, $email);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
        
        if ($stmt->rowCount() < 1) {
            $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE cpf = ? AND nome <> ? OR email <> ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $_SESSION['cpf']);
            $stmt->bindParam(4, $nome);
            $stmt->bindParam(5, $email);
            $res = $stmt->execute();
            if (!$res) die($stmt->errorInfo());
        }
    }
    exit(header('Location: http://localhost/writit/pages/dashboard/configuracoes'));
?>