<?php
    session_start();
    if (isset($_SESSION['username']) || isset($_SESSION['tipo']) || isset($_SESSION['logged'])) session_unset();

    include '../../connection.php';

    $email = strtolower($_POST['email']);
    $senha = md5($_POST['password']);

    $sql = "SELECT email, senha, nome, tipo FROM usuarios WHERE email='$email' AND senha='$senha'";
    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){
        $row = $resultado->fetch_assoc();
        $_SESSION['username'] = $row['nome'];
        $_SESSION['tipo'] = $row['tipo'];
        $_SESSION['logged'] = 1;
        header('Location: ../dashboard');
    } else {
        header('Location: ./');
    }

?>