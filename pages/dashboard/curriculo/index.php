<?php
    include_once '../../../utils/is_logged.php';
    if ($logado === false) exit(header('Location: http://localhost/writit/pages/login'));

    include_once '../../../utils/database.php';
    include_once '../../../utils/dados_usuario.php';
    include_once '../../../utils/dados_curriculo.php';
    if ($stmt_curr->rowCount() === 0) Header('Location: http://localhost/writit/pages/dashboard/curriculo/novow');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Metas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- General -->
    <title>Writit | Dashboard</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Styles -->
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../dashboard.css">
    <link rel="stylesheet" href="./curriculo.css">
</head>
<body>
    <?php
        include_once('../../../components/sidebar.php');
    ?>
    

    <!-- Main -->
    <main>
        <h1 class="title">Currículo</h1>

        <div>
            <h2>Dados gerais</h2>
            <div class="curr_dados">
                <p aria-label="ID do currículo">
                    <span><i class="fa-solid fa-id-badge"></i></span> 
                    <?=$curr_id?>
                </p>
                <p aria-label="Nome completo">
                    <span><i class="fa-solid fa-user"></i></span> 
                    <?=$curr_nome?>
                </p>
                <p aria-label="Email">
                    <span><i class="fa-solid fa-envelope"></i></span> 
                    <?=$curr_email?>
                </p>
                <p aria-label="Cidade">
                    <span><i class="fa-solid fa-city"></i></span> 
                    <?=$curr_cidade?>
                </p>
                <p aria-label="Telefone">
                    <span><i class="fa-solid fa-phone"></i></span> 
                    <?=$curr_telefone?>
                </p>
            </div>
        </div>

        <div>
            <h2>Habilidades</h2>
            <?php
                if ($curr_dados['habilidades'] == false) {
                    echo "<p>Você ainda não adicionou nenhum dado!</p>";
                } else {
                    echo "
                        <table>
                            <tr>
                                <th>Habilidade</th>
                                <th>Tempo</th>
                            </tr>
                    ";
                    foreach($curr_habilidades as $item){
                        $string = intval($item['tempo']) > 1 ? "anos" : "ano";
                        echo "
                            <tr>
                                <td>".$item['habilidade']."</td>
                                <td>".$item['tempo']." $string</td>
                            </tr>
                        ";
                    }
                    echo "</table>";
                }
            ?>
            <div class="row">
                <form class="add_form" method="POST" action="./inserir/habilidade.php">
                    <input type="text" placeholder="Habilidade" name="habilidade" autocomplete="off" autofocus>
                    <input type="number" placeholder="Anos de experiência" name="experiencia" autocomplete="off">
                    <button>Adicionar</button>
                </form>
                <?php
                    if ($curr_habilidades && count($curr_habilidades) > 0) {
                        echo "<a href=\"./excluir/habilidades.php\">Esvaziar</a>";
                    }
                ?>
            </div>
        </div>

        <div>
            <h2>Competências</h2>
            <?php
                if ($curr_dados['competencias'] === false) {
                    echo "<p>Você ainda não adicionou nenhum dado!</p>";
                } else {
                    echo "
                        <table>
                            <tr>
                                <th>Competência</th>
                            </tr>
                    ";
                    foreach($curr_competencias as $item){
                        echo "
                            <tr>
                                <td>".$item['competencia']."</td>
                            </tr>
                        ";
                    }
                    echo "</table>";
                }
            ?>
            <div class="row">
                <form class="add_form" method="POST" action="./inserir/competencia.php">
                    <input type="text" placeholder="Competência" name="competencia" autocomplete="off">
                    <button>Adicionar</button>
                </form>
                <?php
                    if ($curr_competencias && count($curr_competencias) > 0) {
                        echo "<a href=\"./excluir/competencias.php\">Esvaziar</a>";
                    }
                ?>
            </div>
        </div>

        <div>
            <h2>Educação</h2>
            <?php
                if ($curr_dados['educacao'] === false) {
                    echo "<p>Você ainda não adicionou nenhum dado!</p>";
                } else {
                    echo "
                        <table>
                            <tr>
                                <th>Instituição</th>
                                <th>Curso</th>
                                <th>Início</th>
                                <th>Conclusão</th>
                            </tr>
                    ";
                    foreach($curr_educacao as $item){
                        echo "
                            <tr>
                                <td>".$item['instituicao']."</td>
                                <td>".$item['curso']."</td>
                                <td>".$item['inicio']."</td>
                                <td>".$item['conclusao']."</td>
                            </tr>
                        ";
                    }
                    echo "</table>";
                }
            ?>
            <div class="row">
                <form class="add_form" method="POST" action="./inserir/educacao.php">
                    <input type="text" placeholder="Instituição" name="instituicao" autocomplete="off">
                    <input type="text" placeholder="Curso" name="curso" autocomplete="off">
                    <input type="number" placeholder="Ano de início" name="inicio">
                    <input type="number" placeholder="Ano de conclusão" name="conclusao">
                    <button>Adicionar</button>
                </form>
                <?php
                    if ($curr_educacao && count($curr_educacao) > 0) {
                        echo "<a href=\"./excluir/educacao.php\">Esvaziar</a>";
                    }
                ?>
            </div>
        </div>

        <div>
            <h2>Experiência profissional</h2>
            <?php
                if ($curr_dados['experiencia'] === false) {
                    echo "<p>Você ainda não adicionou nenhum dado!</p>";
                } else {
                    echo "
                        <table>
                            <tr>
                                <th>Empresa</th>
                                <th>Função</th>
                                <th>Início</th>
                                <th>Conclusão</th>
                            </tr>
                    ";
                    foreach($curr_experiencias as $item){
                        echo "
                            <tr>
                                <td>".$item['empresa']."</td>
                                <td>".$item['funcao']."</td>
                                <td>".$item['inicio']."</td>
                                <td>".$item['conclusao']."</td>
                            </tr>
                        ";
                    }
                    echo "</table>";
                }
            ?>
            <div class="row">
                <form class="add_form" method="POST" action="./inserir/experiencia.php">
                    <input type="text" placeholder="Empresa" autocomplete="off" name="empresa">
                    <input type="text" placeholder="Função" autocomplete="off" name="funcao">
                    <input type="number" placeholder="Ano de início" name="inicio">
                    <input type="number" placeholder="Ano de conclusão" name="conclusao">
                    <button>Adicionar</button>
                </form>
                <?php
                    if ($curr_experiencias && count($curr_experiencias) > 0) {
                        echo "<a href=\"./excluir/experiencias.php\">Esvaziar</a>";
                    }
                ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php
        include_once('../../../components/footer.php');
    ?>

    <!-- Application -->
</body>
</html>