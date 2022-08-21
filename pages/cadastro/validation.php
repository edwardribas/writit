<?php
    session_start();
    if (isset($_SESSION['logged']) || isset($_SESSION['cpf'])) session_unset();

    include_once '../../connection.php';
    
    $nome = strtolower($_POST['username']);
    $email = strtolower($_POST['email']);
    $cpf = $_POST['cpf'];
    $senha = md5($_POST['password']);
    $tipo = $_POST['tipo'];
    
    if ($pdo) {
        $sql = "SELECT cpf, email FROM usuarios WHERE email=? AND cpf=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $cpf);
        $res = $stmt->execute();
        
        if (!$res) die($stmt->errorInfo());
        
        if ($stmt->rowCount() === 0) {
            $sql = "INSERT INTO usuarios (nome, email, senha, cpf, tipo) VALUES (?, ?, ?, ?, ?);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $senha);
            $stmt->bindParam(4, $cpf);
            $stmt->bindParam(5, $tipo);
            $res = $stmt->execute();
    
            if (!$res) die($stmt->errorInfo());
    
            $_SESSION['logged'] = true;
            $_SESSION['cpf'] = $cpf;
            Header('Location: ../dashboard');
            exit;
        };
        
        Header('Location: ./');
    }
?>