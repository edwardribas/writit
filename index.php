<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Metas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible">

    <!-- General -->
    <title>Writit | Encontre profissionais.</title>
    <link rel="shortcut icon" href="./assets/img/logo.svg">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/index.css">
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <a href="#"><img src="./assets/img/logo-text.svg"></a>
            <ul>
                <li class="link"><a href="#hero">Explore</a></li>
                <li class="link"><a href="#benefits">Benefícios</a></li>
                <li class="link"><a href="#newsletter">Newsletter</a></li>
                <li class="cta-link"><a href="./pages/login">Entrar</a></li>
            </ul>
            <button>
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </header>

    <!-- Main -->
    <main>
        <!-- Hero -->
        <section id="hero">
            <div class="text">
                <h1>Writit, não perca um segundo.</h1>
                <h2>
                    Uma plataforma oficial do Centro Paula Souza para investir em alunos altamente capacitados.
                </h2>
                
                <a href="./pages/login">Entre agora</a>
            </div>
            <figure>
                <img src="./assets/img/hero.jpg">
            </figure>
        </section>

        <!-- Benefits -->
        <section id="benefits">
            <figure>
                <img src="./assets/img/benefits.jpg">
            </figure>
            <div class="text">
                <h2>Quais são os benefícios?</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet assumenda laborum repellendus reiciendis molestiae eligendi tempore alias magnam dolorem odio!
                </p>
                <a href="#newsletter">Newsletter</a>
            </div>
        </section>

        <!-- Newsletter -->
        <section id="newsletter">
            <h2>Se inscreva em nossa newsletter</h2>
            <form>
                <fieldset>
                    <input type="email" id="email" spellcheck="false" autocomplete="off" placeholder=" ">
                    <label for="email">Digite seu e-mail</label>
                </fieldset>
                <button disabled>Enviar</button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <?php
        include_once('./components/footer.php');
    ?>

    <!-- Application -->
    <script src="./assets/app.js"></script>
</body>
</html>