<?php 
    include_once '../utils/is_logged.php';

    if ($logado = true) {
        header('Location: http://localhost/writit/pages/dashboard/painel');
    } else {
        header('Location: http://localhost/writit/pages/login');
    }
?>