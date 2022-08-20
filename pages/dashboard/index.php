<?php
    // Redirecionamento
    session_start();
    if (isset($_SESSION['logged']) && $_SESSION['logged'] && $_SESSION['cpf'] && isset($_SESSION['cpf'])) {
        Header('Location: ./painel');
        exit;
    }
    Header('Location: ../login');
?>