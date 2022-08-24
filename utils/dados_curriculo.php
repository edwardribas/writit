<?php
    $sql = "SELECT id_curr, telefone, cidade, email, nome, foto FROM curriculo WHERE cpf_user=?";
    $stmt_curr = $pdo->prepare($sql);
    $stmt_curr->bindParam(1, $_SESSION['cpf']);
    $res = $stmt_curr->execute();

    if (!$res) die($stmt_curr->errorInfo());

    if ($stmt_curr->rowCount() === 1) {
        $rows = $stmt_curr->fetchAll(PDO::FETCH_ASSOC);
        $curr_nome = $rows[0]['nome'];
        $curr_email = $rows[0]['email'];
        $curr_telefone = $rows[0]['telefone'];
        $curr_cidade = $rows[0]['cidade'];
        $curr_foto = $rows[0]['foto'];
        $curr_id = $rows[0]['id_curr'];

        $curr_dados = array(
            "educacao" => false,
            "habilidades" => false,
            "competencias" => false,
            "experiencia" => false,
        );

        // Habilidades
        $sql = "SELECT id_hab, habilidade, tempo FROM habilidades WHERE id_curr = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $curr_id);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
        if ($stmt->rowCount() > 0) {
            $curr_dados['habilidades'] = true;
            $curr_habilidades = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Educação
        $sql = "SELECT id_edu, instituicao, curso, inicio, conclusao FROM educacao WHERE id_curr = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $curr_id);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
        if ($stmt->rowCount() > 0) {
            $curr_dados['educacao'] = true;
            $curr_educacao = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // // Competências
        $sql = "SELECT id_comp, competencia FROM competencias WHERE id_curr = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $curr_id);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
        if ($stmt->rowCount() > 0) {
            $curr_dados['competencias'] = true;
            $curr_competencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // // Experiência profissional
        $sql = "SELECT id_exp, empresa, funcao, inicio, conclusao FROM experiencia WHERE id_curr = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $curr_id);
        $res = $stmt->execute();
        if (!$res) die($stmt->errorInfo());
        if ($stmt->rowCount() > 0) {
            $curr_dados['experiencia'] = true;
            $curr_experiencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>