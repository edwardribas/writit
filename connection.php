<?php
    $servidor = "127.0.0.1";
    $usuario = "root";
    $senha = "";
    $banco = "projeto";

    //criando conexão
    $conn = new mysqli($servidor, $usuario, $senha, $banco);

    //checando conexão
    if($conn->connect_error){
        die("Conexão falhou: ". $conn->connect_error);
    }
?>