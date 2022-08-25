<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));

    include_once '../../../../utils/database.php';
    include_once '../../../../utils/dados_curriculo.php';

    if ($stmt_curr->rowCount() > 0 && $curr_dados['competencias'] === true) {
        $sql = "DELETE FROM competencias WHERE id_curr = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $curr_id);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
    }

    exit(header('Location: http://localhost/writit/pages/dashboard/curriculo'));
?>