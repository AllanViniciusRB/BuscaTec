<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/Visita_TecnicaController.php";

?>

<body>
    <header>

    </header>
    <main>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th style="width: 200px;">Ação</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $AgendamentoController = new Visita_TecnicaController();
                $agendamento = $AgendamentoController->listarVisita_Tecnica();

                foreach ($agendamento as $servico) :
                ?>
                    <tr>
                        <td><?= $servico->id_visita ?></td>
                        <td><?= $servico->email ?></td>
                        <td>
                            <a href="/admin/Infos/servico.php?id=<?= $servico->id_visita ?>" class="btn btn-primary btn-sm">Visualizar</a>
                            <a href="/admin/Infos/Informacoesdoservico.php?id=<?= $servico->id_visita ?>" class="btn btn-danger btn-sm">Aceitar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </main>
</body>

</html>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>