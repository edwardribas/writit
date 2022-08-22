<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));

    include_once '../../../../utils/database.php';
    include_once '../../../../utils/dados_curriculo.php';

    if ($stmt_curr->rowCount() === 1) {
        $sql = "DELETE FROM curriculo WHERE cpf_user = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $_SESSION['cpf']);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
    }

    header('Location: http://localhost/writit/pages/dashboard/painel');
?>