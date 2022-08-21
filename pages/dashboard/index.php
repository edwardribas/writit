<?php 
    include_once '../utils/is_logged.php';

    if ($logado = true) {
        header('Location: ./painel');
    } else {
        header('Location: ../login');
    }
?>