<?php
    session_start();
    if (!$_SESSION['logged'] && !$_SESSION['cpf']) {
        session_unset();
        session_destroy();
        Header('Location: ../');
        exit;
    }

    include '../../../connection.php';

    if ($pdo) {
        $sql = "SELECT nome, tipo, email FROM usuarios WHERE cpf=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $_SESSION['cpf']);
        $res = $stmt->execute();
    
        if (!$res) {
            print_r($stmt->errorInfo());
            exit;
        };

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nome = $rows[0]['nome'];
        $tipo = $rows[0]['tipo'];
        $email = $rows[0]['email'];

        if ($tipo === "1") {
            $tipoUser = 'Aluno';
        } else if($tipo === "2") {
            $tipoUser = 'Empresa';
        } else {
            $tipoUser = 'Admin';
        };

        if ($tipo === "1") {
            $_sql = "SELECT telefone, cidade, email, nome, cpf_user FROM curriculo WHERE cpf_user=?";
            $stmt_curr = $pdo->prepare($_sql);
            $stmt_curr->bindParam(1, $_SESSION['cpf']);
            $_res = $stmt_curr->execute();
    
            if (!$_res) {
                print_r($stmt_curr->errorInfo());
                exit;
            }

            if ($stmt_curr->rowCount() === 1) {
                $_rows = $stmt_curr->fetchAll(PDO::FETCH_ASSOC);
                $telefone = $_rows[0]['telefone'];
                $cidade = $_rows[0]['cidade'];
                $nomeCurriculo = $_rows[0]['nome'];
                $emailCurriculo = $_rows[0]['email'];
            }
        }
    }
?>