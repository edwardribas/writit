<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));

    include_once '../../../../utils/database.php';
    include_once '../../../../utils/dados_curriculo.php';

    function destroySession(){
        session_unset();
        session_destroy();
        exit(header('Location: http://localhost/writit/pages/login'));
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
        if ($curr_dados["educacao"] === true) {
            $sql = "DELETE FROM educacao WHERE id_curr = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $curr_id);
            $res = $stmt->execute();
            if (!$res) die($stmt->errorInfo());
        }
        if ($curr_dados["habilidades"] === true) {
            $sql = "DELETE FROM habilidades WHERE id_curr = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $curr_id);
            $res = $stmt->execute();
            if (!$res) die($stmt->errorInfo());
        }
        if ($curr_dados["competencias"] === true) {
            $sql = "DELETE FROM competencias WHERE id_curr = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $curr_id);
            $res = $stmt->execute();
            if (!$res) die($stmt->errorInfo());
        }
        if ($curr_dados["experiencia"] === true) {
            $sql = "DELETE FROM experiencia WHERE id_curr = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $curr_id);
            $res = $stmt->execute();
            if (!$res) die($stmt->errorInfo());
        }
        $sql = "DELETE FROM curriculo WHERE cpf_user = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $_SESSION['cpf']);
        $res = $stmt->execute();

        if (!$res) die($stmt->errorInfo());
        deleteUser($pdo);
    }
?>