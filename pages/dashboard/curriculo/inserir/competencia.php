<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));

    include_once '../../../../utils/database.php';
    include_once '../../../../utils/dados_curriculo.php';

    $competencia = $_POST['competencia'];

    if(isset($competencia) && !empty($competencia) && $stmt_curr->rowCount() > 0){
        $sql = "INSERT INTO competencias (competencia, id_curr) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, ucfirst($competencia));
        $stmt->bindParam(2, $curr_id);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
    }

    exit(header('Location: http://localhost/writit/pages/dashboard/curriculo'));
?>