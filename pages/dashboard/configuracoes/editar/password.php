<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));
    include_once '../../../../utils/database.php';

    $oldpass = md5($_POST['oldpass']);
    $newpass = md5($_POST['newpass']);

    if (isset($oldpass) && !empty($oldpass) && isset($newpass) && !empty($newpass)) {
        $sql = "SELECT senha FROM usuarios WHERE cpf = ? AND senha = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $_SESSION['cpf']);
        $stmt->bindParam(2, $oldpass);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());

        if ($stmt->rowCount() === 1) {
            $sql = "UPDATE usuarios SET senha = ? WHERE senha <> ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $newpass);
            $stmt->bindParam(2, $newpass);
            $res = $stmt->execute();
            if (!$res) die($stmt->errorInfo());
        }
    }
    exit(header('Location: http://localhost/writit/pages/dashboard/configuracoes'));
?>