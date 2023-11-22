<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/ServicoController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

$servico = new ServicoController();
$servico = $servico->buscarServico($_GET["id"]);
$usuario = new UsuarioController();
$usuario = $usuario->buscarUsuario($servico["id_usuario"]);

?>



<main>

    <div class="container mt-5">
        <h2 class="mb-4">Ordem de Serviço</h2>

        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nomeCliente">Nome do Cliente</label>
                    <input type="text" class="form-control" id="nomeCliente" value="<?= $usuario->nome ?>"
                        placeholder="Nome do Cliente" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="idServico">Ordem Serviço</label>
                    <input type="text" class="form-control" id="idServico" value="<?= $servico["id_servico"] ?>"
                        placeholder="ID do Serviço" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="numeroCasa">Número da Casa</label>
                    <input type="text" class="form-control" id="numeroCasa" value="<?= $usuario->numerocasa ?>"
                        placeholder="Número da Casa" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" value="<?= $usuario->cidade?>"
                        placeholder="Cidade" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="estado">Estado</label>

                    <input type="text" class="form-control" id="rua" value="<?= $usuario->estado ?>" placeholder="Rua"
                        readonly>

                </div>
                <div class="form-group col-md-6">
                    <label for="idServico">Rua</label>
                    <input type="text" class="form-control" id="idServico" value="<?= $usuario->rua ?>"
                        placeholder="ID do Serviço" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dia">Dia</label>
                    <input type="date" class="form-control" id="dia" value="<?= $servico["dia"] ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="hora">Hora</label>
                    <input type="time" class="form-control" value="<?= $servico["hora"] ?>" id="hora" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" value="<?= $servico["valor"] ?>" id="valor" placeholder="R$"
                        readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="descricaoProblema">Descrição do Problema</label>

                    <textarea id="informacoes" class="form-control" name="informacoes"
                        readonly><?= $servico["informacoes"] ?></textarea>
                </div>
            </div>

            <button type="button" class="btn btn-secondary">Imprimir Ordem</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</main>

</body>

</html>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";

?>