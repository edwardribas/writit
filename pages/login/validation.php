<?php
    include_once '../../utils/is_logged.php';
    include_once '../../utils/database.php';

    if ($logado === true) exit(header('Location: ../dashboard'));

    
    if (isset($_POST['submit'])) {
        $email = strtolower($_POST['email']);
        $senha = md5($_POST['password']);
        
        if (isset($email) && isset($senha) && !empty($email) && !empty($senha)) {
            $sql = "SELECT cpf FROM usuarios WHERE email=? AND senha=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $senha);
            $res = $stmt->execute();
        
            if (!$res) die($stmt->errorInfo()); 
            
            if ($stmt->rowCount() === 1) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['logged'] = true;
                $_SESSION['cpf'] = $rows[0]['cpf'];
                exit(header('Location: ../dashboard'));
            };
        }
    }
    header('Location: ./');
?>