<header class="sidebar">
    <a href="../painel">
        <?php
            if ($stmt_curr->rowCount() === 1) {
                echo "<img src=\"data:image/png;base64,$curr_foto\">";
            } else {
                echo "<img src=\"http://localhost/writit/assets/img/avatar.svg\">";
            }
        ?>
    </a>
    <span>Seja bem-vindo,</span>

    <h3><?php echo ucfirst($nome); ?></h3>
    <hr>
    <nav>
        <ul>
            <li><a href="http://localhost/writit/pages/dashboard/painel"><i class="fa-solid fa-pager"></i> Painel</a></li>
            <?php 
                if ($tipo === "1") {
                    echo $stmt_curr->rowCount() === 1
                        ? "<li><a href=\"http://localhost/writit/pages/dashboard/curriculo\"><i class=\"fa-solid fa-user\"></i> Currículo</a></li>"
                        : "<li><a href=\"http://localhost/writit/pages/dashboard/curriculo/novo\"><i class=\"fa-solid fa-user\"></i> Criar currículo</a></li>";
                }
            ?>
            <li><a href="http://localhost/writit/pages/dashboard/configuracoes"><i class="fa-solid fa-gear"></i> Configurações</a></li>
            <li class="cta-link"><a href="http://localhost/writit/utils/deslogar.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair </a></li>
        </ul>
    </nav>
</header>