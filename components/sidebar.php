<header class="sidebar">
    <a href="../../../."><img src="../../../assets/img/logo.svg"></a>
    <span>Seja bem-vindo,</span>

    <h3><?php echo ucfirst($nome); ?></h3>
    <hr>
    <nav>
        <ul>

            <li><a href="../perfil"><i class="fa-solid fa-pager"></i> Painel</a></li>
            <?php 
                if ($tipo === "1" || $tipo === "3") {
                    echo "<li><a href=\"../curriculo\"><i class=\"fa-solid fa-user\"></i> Currículo</a></li>";
                }
            ?>
            <li class="cta-link"><a href="../../../components/processa_logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair </a></li>
        </ul>
    </nav>
</header>