<?php
    session_start();
    if (isset($_SESSION['logged']) || isset($_SESSION['username'])) session_unset();

    include '../../../connection.php';

    $usuario = strtolower($_POST['username']);
    $email = strtolower($_POST['email']);
    $cpf = $_POST['cpf'];
    $senha = md5($_POST['password']);
    $tipo = $_POST['tipo'];

    $sql = "SELECT cpf, email, senha FROM usuarios WHERE email='$email' AND cpf='$cpf' AND senha='$senha'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        Header('Location: ../.');
    } else {
        $sql = "INSERT INTO usuarios (nome, email, senha, cpf, tipo) VALUES ('$usuario', '$email', '$senha', '$cpf', '$tipo')";
        $res = $conn->query($sql);
        if ($res === TRUE) {
            $_SESSION['logged'] = 1;
            $_SESSION['username'] = $usuario;
            $_SESSION['tipo'] = $tipo;
            Header('Location: ../../dashboard');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>