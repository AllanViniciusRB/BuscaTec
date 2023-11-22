<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/Visita_TecnicaController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/ServicoController.php";


$servicocadastro = new ServicoController();
$servicocadastro->cadastroServico();

// Verificar se o ID da visita está presente na URL
$id_visita = isset($_GET['id']) ? $_GET['id'] : null;

$VisitaController = new Visita_TecnicaController();
$visita = $VisitaController->obterVisitaPorId($id_visita);

// Verificar se $visita é um objeto antes de acessar propriedades
if ($visita && is_object($visita)) {
    $descricao = property_exists($visita, 'descricao') ? $visita->descricao : 'Descrição não disponível';
} else {
    // Se $visita não for válido, redirecione ou trate de acordo com a lógica da sua aplicação
    header("Location: /admin/Infos/listaproblemas.php");
    exit();
}
?>

<main>
    <div class="container mt-5">
        <form action="/admin/Infos/servico.php" method="post">
            <label for="idServico">ID do Serviço:</label>
            <input type="text" class="form-control text-center" id="idServico" value="<?= $id_visita ?>" readonly>
            <div class="form-group">
                <label for="dia">Data:</label>
                <input type="date" class="form-control" id="dia" name="dia" required>
            </div>
            <input type="text" name="id_usuario" value="<?=$visita->id_usuario?>">
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
        </form>
    </div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>