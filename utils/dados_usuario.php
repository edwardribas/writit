<?php
    $sql = "SELECT nome, email, tipo FROM usuarios WHERE cpf=?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_SESSION['cpf']);
    $res = $stmt->execute();

    if (!$res) die($stmt->errorInfo());

    if ($stmt->rowCount() === 1) {
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nome = $rows[0]['nome'];
        $email = $rows[0]['email'];
        $tipo = $rows[0]['tipo'];
        
        if ($tipo === "1") {
            $tipoStr = "Aluno";
        } elseif ($tipo === "2") {
            $tipoStr = "Empresa";
        } else {
            $tipoStr = "Admin";
        }
    }
?>