<?php
    $sql = "SELECT telefone, cidade, email, nome, foto FROM curriculo WHERE cpf_user=?";
    $stmt_curr = $pdo->prepare($sql);
    $stmt_curr->bindParam(1, $_SESSION['cpf']);
    $res = $stmt_curr->execute();

    if (!$res) die($stmt_curr->errorInfo());

    if ($stmt_curr->rowCount() === 1) {
        $rows = $stmt_curr->fetchAll(PDO::FETCH_ASSOC);
        $curr_nome = $rows[0]['nome'];
        $curr_email = $rows[0]['email'];
        $curr_telefone = $rows[0]['telefone'];
        $curr_cidade = $rows[0]['cidade'];
        $curr_foto = $rows[0]['foto'];
    }
?>