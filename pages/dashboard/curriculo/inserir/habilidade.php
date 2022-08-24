<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));

    include_once '../../../../utils/database.php';
    include_once '../../../../utils/dados_curriculo.php';

    $habilidade = $_POST['habilidade'];
    $tempo = $_POST['experiencia'];

    if(isset($habilidade) && isset($tempo) && !empty($tempo) && !empty($habilidade) && $stmt_curr->rowCount() > 0){
        $sql = "INSERT INTO habilidades (habilidade, tempo, id_curr) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, ucfirst($habilidade));
        $stmt->bindParam(2, $tempo);
        $stmt->bindParam(3, $curr_id);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
    }

    exit(header('Location: http://localhost/writit/pages/dashboard/curriculo'));
?>