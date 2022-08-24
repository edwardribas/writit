<?php
    include_once '../../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'))
    else exit(header('Location: http://localhost/writit/pages/dashboard'));
?>