<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));

    include_once '../../../../utils/database.php';
    include_once '../../../../utils/dados_curriculo.php';

    $instituicao = $_POST['instituicao'];
    $curso = $_POST['curso'];
    $inicio = $_POST['inicio'];
    $conclusao = $_POST['conclusao'];

    if (isset($curso) && !empty($curso) && isset($instituicao) && !empty($instituicao) && isset($inicio) && !empty($inicio) && isset($conclusao) && !empty($conclusao) && $stmt_curr->rowCount() > 0) {
        $sql = "INSERT INTO educacao (instituicao, curso, inicio, conclusao, id_curr) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, ucfirst($instituicao));
        $stmt->bindParam(2, ucfirst($curso));
        $stmt->bindParam(3, $inicio);
        $stmt->bindParam(4, $conclusao);
        $stmt->bindParam(5, $curr_id);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
    }

    exit(header('Location: http://localhost/writit/pages/dashboard/curriculo'));
?>