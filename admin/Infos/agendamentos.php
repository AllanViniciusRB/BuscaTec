<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/Visita_TecnicaController.php";

$agendamentoController = new Visita_TecnicaController();

$agendamentoController->cadastroVisita();

?>

<main class="container box-center">
    <div class="container mt-5">
        <form action="/admin/Infos/agendamentos.php" method="post">

            <div class="form-group">
                <label for="descricao">Descrição do Problema:</label>
                <textarea class="form-control" id="descricao" rows="3" name="descricao" required></textarea>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>


            <button type="submit" class="btn btn-primary">Agendar</button>
        </form>
    </div>

    <!-- Adicione o link para o arquivo Bootstrap JS e o jQuery se necessário -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>