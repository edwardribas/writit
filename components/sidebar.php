<?php
    session_start();
?>
<header class="sidebar">
    <img src="../../../assets/img/logo.svg">
    <span>Seja bem-vindo,</span>

    <h3><?php echo $_SESSION['username'];?></h3>
    <hr>
    <nav>
        <ul>
            <li><a href="../perfil"><i class="fa-solid fa-pager"></i> Painel</a></li>
            <li><a href="../curriculo"><i class="fa-solid fa-folder"></i> Currículo</a></li>
            <li class="cta-link"><a href="../../../components/processa_logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair </a></li>
        </ul>
    </nav>
</header>