<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoInicio.php";
?>
<main>
    <?php
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";



    $usuarioController = new UsuarioController();

    $usuarioController->loginUsuario();

    ?>

    <body id="principal">

        <div id="login">
            <?php

            if (isset($_GET["error"])) {
                $errorMessage = urldecode($_GET["error"]);
                echo '<div class="error-message">' . $errorMessage . '</div>';
            }
            ?>
            <div class="caixa">

                <div class="desenvolvimento">
                    <h2>Site em Desenvolvimento</h2>
                </div>
                <img src="/assets/img/a.png" alt="">
                <h1>Login</h1>
                <form action="index.php" method="post">

                    <div class="email">
                        <input type="email" name="email" id="email" placeholder="E-mail">
                    </div>

                    <div class="senha">
                        <input type="password" name="senha" id="senha" placeholder="Senha">
                    </div>

                    <div class="entrar">
                        <p>Ainda não tem uma conta? <a href="/admin/usuarios/cadastrar.php">Crie uma.</a></p>
                        <input type="submit" value="Entrar">
                    </div>
                </form>

            </div>

        </div>

    </body>

    </html>

    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
    ?>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>