<?php
    session_start();

    if (isset($_SESSION)) session_unset();
    Header('Location: ../pages/login');
?>