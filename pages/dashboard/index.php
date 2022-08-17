<?php
    // Redirecionamento
    session_start();
    if ($_SESSION['logged'] === 1) {
        Header('Location: ./perfil');
    }
?>