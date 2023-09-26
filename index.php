<?php
include 'classes/Utils.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desafio Técnico 4YouSee</title>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="painel">
    <h1 class="center">Desafio Técnico proposto pela 4YouSee na Coodesh</h1>
    <ul>
        <li>O sistema só poderá exibir planos que tenham schedule.startDate válidos, ou seja, menor que a data atual.
        </li>
        <li>O sistema só poderá exibir 1 única vez planos que tenham os mesmos : name, localidade dando preferência quem
            possuir o schedule.startDate mais recente.
        </li>
        <li>Note que o campo localidade possui uma hierarquia (PAÍS -> ESTADO -> CIDADE). Esta hierarquia deverá ser
            respeitada, de maneira que a cidade terá maior prioridade que estado e país. O sistema só poderá exibir 1
            única vez planos que tenham os mesmos : name dando preferência a hierarquia de localidades.
        </li>
    </ul>


    <?php if (isset($_GET['filtro'])) { ?>

        <fieldset>
            <legend>Planos válidos baseados nos critérios dos filtros, extraídos do arquivo data.json</legend>

            <?php

            $dados = Utils::lerArquivo('data.json');
            $planos = Utils::filtrar($dados->plans);
            Utils::imprimeTabela($planos);
            ?>

            <h1 class="center">Samsung Galaxy S8</h1>
            <table class="table filtro">
                <thead>
                <tr>
                    <th colspan="<?= count($planos) | 1 ?>">PLANOS:</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!count($planos)) { ?>
                <tr>
                    <td colspan="1">Nenhum plano foi encontrado com o(s) critério(s) informado(s)!</td>
                <?php } ?>
                <tr>
                    <?php foreach ($planos as $plano) { ?>
                        <td class="center">
                            <h2><?= $plano->name ?></h2>
                            <p>Plano <?= Utils::normalizaTipo($plano->type) ?></p>
                            <p>Valor sem o Plano: <strong><?= Utils::formataMoeda($plano->phonePrice) ?></strong></p>
                            <p>Valor no Plano: <strong><?= Utils::formataMoeda($plano->phonePriceOnPlan) ?></strong></p>
                            <p>Parcela Mensal: <strong><?= $plano->installments ?></strong> x
                                <strong><?= Utils::formataMoeda($plano->monthly_fee) ?></strong></p>
                        </td>
                    <?php } ?>
                </tr>
                </tbody>
            </table>


        </fieldset>
        <a href="index.php" class="btn pull-right">Voltar</a>

    <?php } else { ?>

        <fieldset>
            <legend>TODOS os planos</legend>

            <?php

            $dados = Utils::lerArquivo('data.json');
            ?>
            <h2 class="center"><?= $dados->Aparelho->name ?></h2>
            <?php
            Utils::imprimeTabela($dados->plans);
            ?>

        </fieldset>
        <a href="index.php?filtro" class="btn">Executar os filtros</a>

    <?php } ?>


</div>

</body>
</html>