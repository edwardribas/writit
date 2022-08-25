<?php
    include '../../../../utils/is_logged.php';
    include '../../../../utils/database.php';
    include '../../../../utils/dados_curriculo.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));


    $foto = $_FILES['imagem'];

    if (
        isset($foto) && $foto['type'] === "image/png" || $foto['type'] === "image/jpeg" || 
        $foto['type'] === "image/jpeg" && $foto['size'] < 16000000
    ){
        $imagem = $foto['tmp_name'];
        $imgContent = base64_encode(file_get_contents($imagem));
        $sql = "UPDATE curriculo SET foto = ? WHERE id_curr = ? AND foto <> ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $imgContent);
        $stmt->bindParam(2, $curr_id);
        $stmt->bindParam(3, $imgContent);
        $res = $stmt->execute();

        if (!$res) die($stmt->errorInfo());
    }
    header('Location: http://localhost/writit/pages/dashboard/configuracoes');
?>