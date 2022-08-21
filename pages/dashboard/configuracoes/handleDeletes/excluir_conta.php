<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: ../../'));

    include_once '../../../../utils/database.php';
    include_once '../../../../utils/dados_curriculo.php';

    function destroySession(){
        session_unset();
        session_destroy();
        exit(header('Location: ../../'));
    }

    function deleteUser($pdo){
        $sql = "DELETE FROM usuarios WHERE cpf = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $_SESSION['cpf']);
        $res = $stmt->execute();
    
        if (!$res) die($stmt->errorInfo());
        destroySession();
    }

    if ($stmt_curr->rowCount() === 0) {
        deleteUser($pdo);
    } else {
        $sql = "DELETE FROM curriculo WHERE cpf_user = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $_SESSION['cpf']);
        $res = $stmt->execute();

        if (!$res) die($stmt->errorInfo());
        deleteUser($pdo);
    }
?>