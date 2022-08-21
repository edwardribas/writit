<?php
    // Constants
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'project';

    // Connection
    try {
        $pdo = new PDO( "mysql:host=$host;dbname=$database", $username, $password );
    } catch( PDOException $e ) {
        die("Erro ao conectar ao MySQL: " . $e->getMessage());
    }
?>