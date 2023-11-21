<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/Visita_TecnicaController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/ServicoController.php";

$servicoController = new ServicoController();

$servicoController->cadastroServico();

// Verificar se o ID do serviço está presente na URL
$id_servico = isset($_GET['id']) ? $_GET['id'] : null;



$AgendamentoController = new Visita_TecnicaController();
$servico = $AgendamentoController->idVisita($id_servico);

// Recupere a descrição do problema
$descricao = $servico->descricao;
?>

<main>
    <div class="container mt-5">
        <form action="/admin/Infos/Servico.php" method="post">
            <label for="idServico">ID do Serviço:</label>
            <input type="text" class="form-control text-center" id="idServico" value="<?= $id_servico ?>" readonly>
            <div class="form-group">
                <label for="dia">Data:</label>
                <input type="date" class="form-control" id="dia" name="dia" required>
            </div>

            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" class="form-control" id="hora" name="hora" required>
            </div>

            <div class="form-group">
                <label for="informacoes">Descrição do Problema:</label>
                <textarea  id="informacoes" class="form-control" name="informacoes" readonly><?= $descricao?></textarea>
            </div>
            <div class="form-group">
                <label for="valor">Campo Valor:</label>
                <input type="number" class="form-control" id="valor" name="valor" placeholder="Insira o valor do serviço" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
           <?php echo var_dump($servico);?>
        </form>
    </div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>