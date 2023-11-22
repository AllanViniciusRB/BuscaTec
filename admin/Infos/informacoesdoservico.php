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
                    <input type="text" class="form-control" id="nomeCliente" value="<?=$usuario->nome?>" placeholder="Nome do Cliente">
                </div>
                <div class="form-group col-md-6">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" id="rua" value="<?=$usuario->rua?>" placeholder="Rua">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="numeroCasa">Número da Casa</label>
                    <input type="text" class="form-control" id="numeroCasa" value="<?=$usuario->numerocasa?>" placeholder="Número da Casa">
                </div>
                <div class="form-group col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" value="<?=$usuario->cidade?>" placeholder="Cidade">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="estado">Estado</label>
                    <select id="estado" class="form-control">
                        <option selected>Escolha...</option>
                        <option>AC</option>
                        <option>AL</option>
                        <!-- Adicione os estados necessários -->
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="descricaoProblema">Descrição do Problema</label>
                    <textarea  id="informacoes" class="form-control" name="informacoes" readonly><?=$servico["informacoes"]?></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dia">Dia</label>
                    <input type="date" class="form-control" id="dia" value="<?=$servico["dia"]?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="hora">Hora</label>
                    <input type="time" class="form-control" value="<?=$servico["hora"]?>" id="hora">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" id="valor" placeholder="R$">
                </div>
                <div class="form-group col-md-6">
                    <label for="idServico">ID do Serviço</label>
                    <input type="text" class="form-control" id="idServico"value="<?=$servico["id_servico"]?>" placeholder="ID do Serviço">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Imprimir Ordem</button>
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