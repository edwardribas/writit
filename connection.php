<?php
    // Constants
    $host = '127.0.0.1';
    $username = 'root';
    $password = 'password';
    $database = 'projeto';

    // Connection
    try {
        $pdo = new PDO( "mysql:host=$host;dbname=$database", $username, $password );
    } catch( PDOException $e ) {
        die("Erro ao conectar ao MySQL: " . $e->getMessage());
    }
?>