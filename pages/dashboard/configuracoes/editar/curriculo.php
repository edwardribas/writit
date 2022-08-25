<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));
    include_once '../../../../utils/database.php';
    include_once '../../../../utils/dados_curriculo.php';

    if ($stmt_curr->rowCount() === 0) exit(header('Location: http://localhost/writit/pages/dashboard'));

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $cidade = trim($_POST['cidade']);
    $telefone = trim($_POST['telefone']);

    if (isset($nome) && !empty($nome) && isset($email) && !empty($email) && isset($cidade) && !empty($cidade) && isset($telefone) && !empty($telefone)) {
        $sql = "UPDATE curriculo SET nome = ?, email = ?, cidade = ?, telefone = ? WHERE id_curr = ? AND nome <> ? OR email <> ? OR telefone <> ? OR cidade <> ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $cidade);
        $stmt->bindParam(4, $telefone);
        $stmt->bindParam(5, $curr_id);
        $stmt->bindParam(6, $nome);
        $stmt->bindParam(7, $email);
        $stmt->bindParam(8, $telefone);
        $stmt->bindParam(9, $cidade);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
    }
    exit(header('Location: http://localhost/writit/pages/dashboard/configuracoes'));
?>