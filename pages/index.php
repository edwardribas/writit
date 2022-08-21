<?php 
    include_once '../utils/is_logged.php';

    if ($logado = true) {
        header('Location: ./dashboard');
    } else {
        header('Location: ./login');
    }
?>