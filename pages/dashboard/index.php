<?php
    // Redirecionamento
    session_start();
    if (isset($_SESSION['logged']) && $_SESSION['logged'] && $_SESSION['cpf'] && isset($_SESSION['cpf'])) {
        Header('Location: ./perfil');
        exit;
    }
    Header('Location: ../login');
?>