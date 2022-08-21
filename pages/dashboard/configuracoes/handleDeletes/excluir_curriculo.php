<?php
    session_start();

    function destroySession(){
        session_unset();
        session_destroy();
        Header('Location: ../../');
    }

    if (!$_SESSION['logged'] && !$_SESSION['cpf']) destroySession();

    include_once '../../../../connection.php';

    // verifica se o usuário existe
    $sql = "SELECT email FROM usuarios WHERE cpf=?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_SESSION['cpf']);
    $res = $stmt->execute();

    if (!$res) die($stmt->errorInfo());
    if ($stmt->rowCount() === 0) destroySession();

    // verifica se o usuário tem currículo
    $sql = "SELECT cidade FROM curriculo WHERE cpf_user = ? LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_SESSION['cpf']);
    $res = $stmt->execute();
    
    if (!$res) die($stmt->errorInfo());

    if ($stmt->rowCount() === 1) {
        $sql = "DELETE FROM curriculo WHERE cpf_user = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $_SESSION['cpf']);
        $res = $stmt->execute();

        if (!$res) die($stmt->errorInfo());
    }

    Header('Location: ../../painel');
?>