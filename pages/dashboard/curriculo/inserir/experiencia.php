<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));

    include_once '../../../../utils/database.php';
    include_once '../../../../utils/dados_curriculo.php';

    $empresa = $_POST['empresa'];
    $funcao = $_POST['funcao'];
    $inicio = $_POST['inicio'];
    $conclusao = $_POST['conclusao'];

    if (isset($empresa) && !empty($empresa) && isset($funcao) && !empty($funcao) && isset($inicio) && !empty($inicio) && isset($conclusao) && !empty($conclusao) && $stmt_curr->rowCount() > 0 ) {
        $sql = "INSERT INTO experiencia (empresa, funcao, inicio, conclusao, id_curr) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, ucfirst($empresa));
        $stmt->bindParam(2, ucfirst($funcao));
        $stmt->bindParam(3, $inicio);
        $stmt->bindParam(4, $conclusao);
        $stmt->bindParam(5, $curr_id);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
    }

    exit(header('Location: http://localhost/writit/pages/dashboard/curriculo'));
?>