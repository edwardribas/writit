<?php
    session_start();
    if (isset($_SESSION['logged']) || isset($_SESSION['cpf'])) session_unset();

    include_once '../../connection.php';
    $email = strtolower($_POST['email']);
    $senha = md5($_POST['password']);

    if ($pdo) {
        $sql = "SELECT email, senha, cpf FROM usuarios WHERE email=? AND senha=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $senha);
        $res = $stmt->execute();

        if (!$res) {
            print_r($stmt->errorInfo());
            exit;
        };
        
        if ($stmt->rowCount() === 1) {
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['logged'] = true;
            $_SESSION['cpf'] = $rows[0]['cpf'];
            Header('Location: ../dashboard');
            exit;
        };

        Header('Location: ./');
    }
?>