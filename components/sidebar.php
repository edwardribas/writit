<header class="sidebar">
    <a href="../../../."><img src="../../../assets/img/logo.svg"></a>
    <span>Seja bem-vindo,</span>

    <h3><?php echo ucfirst($nome); ?></h3>
    <hr>
    <nav>
        <ul>
            <li><a href="../painel"><i class="fa-solid fa-pager"></i> Painel</a></li>
            <?php 
                if ($tipo === "1") {
                    echo $stmt_curr->rowCount() === 1
                        ? "<li><a href=\"../curriculo\"><i class=\"fa-solid fa-user\"></i> Currículo</a></li>"
                        : "<li><a href=\"../curriculo/cria_curriculo.php\"><i class=\"fa-solid fa-user\"></i> Criar currículo</a></li>";
                }
            ?>
            <li><a href="#"><i class="fa-solid fa-gear"></i> Configurações</a></li>
            <li class="cta-link"><a href="../../../components/processa_logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair </a></li>
        </ul>
    </nav>
</header>