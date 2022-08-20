<?php
    session_start();

    // Conexão
    include '../../../connection.php';

    // Dados
    $nome = $_POST['nome'];
    $telefone = strval($_POST['telefone']);
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];

    if ($pdo) {
        // Verificar se o usuário já possui um currículo
        $sql = "SELECT cpf_user FROM curriculo WHERE cpf_user=?";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(1, $_SESSION['cpf']);
        $res = $sth->execute();

        if (!$res) {
            print_r($sth->errorInfo());
            exit;
        }
        if ($sth->rowCount() > 0) {
            Header('Location: ./');
            exit;
        }

        // Criação do currículo
        $sql = "INSERT INTO curriculo (telefone, cidade, email, cpf_user, nome) VALUES (?, ?, ?, ?, ?)";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(1, $telefone);
        $sth->bindParam(2, $cidade);
        $sth->bindParam(3, $email);
        $sth->bindParam(4, $_SESSION['cpf']);
        $sth->bindParam(5, $nome);
        
        $res = $sth->execute();

        if (!$res) {
            print_r($sth->errorInfo());
            exit;
        }
        
        Header('Location: ./');
    }

?>