<?php
    include_once '../../utils/is_logged.php';
    include_once '../../utils/database.php';

    if ($logado === true) exit(header('Location: ../dashboard'));
    
    $nome = trim($_POST['username']);
    $email = trim($_POST['email']);
    $cpf = $_POST['cpf'];
    $senha = $_POST['password'];
    
    if (isset($nome) && isset($email) && isset($cpf) && isset($senha) && isset($_POST['tipo']) &&
    !empty($nome) && !empty($email) && !empty($cpf) && !empty($senha) && !empty($_POST['tipo']) && strlen($cpf) < 15) {
        $tipo = $_POST['tipo'];

        $sql = "SELECT cpf, email FROM usuarios WHERE email=? AND cpf=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $cpf);
        $res = $stmt->execute();
        
        if (!$res) die($stmt->errorInfo());
        
        if ($stmt->rowCount() === 0) {
            $sql = "INSERT INTO usuarios (nome, email, senha, cpf, tipo) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, strtolower($nome));
            $stmt->bindParam(2, strtolower($email));
            $stmt->bindParam(3, md5($senha));
            $stmt->bindParam(4, trim(strval($cpf)));
            $stmt->bindParam(5, $tipo);
            $res = $stmt->execute();
    
            if (!$res) die($stmt->errorInfo());
    
            $_SESSION['logged'] = true;
            $_SESSION['cpf'] = $cpf;
            exit(header('Location: ../dashboard'));
        }
    }
    header('Location: ./');
?>