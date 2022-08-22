<?php
    session_start();
    $logado = isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['cpf'] && isset($_SESSION['cpf']);
?>