<?php


class Utils
{


    public static function lerArquivo($arquivo, $assoc = false) {
        if (!file_exists($arquivo)) {
            throw new Exception("Arquivo solicitado '{$arquivo}' não existe!");
        }
        $dados = file_get_contents($arquivo);
        return json_decode($dados, $assoc);
    }

    /**
     * O candidato deverá escrever um programa que receberá uma lista de planos(data.json) e deverá retornar a lista
     * filtrada baseada nos critérios abaixo:
     *    - O sistema só poderá exibir planos que tenham schedule.startDate válidos, ou seja, menor que a data atual.
     *    - O sistema só poderá exibir 1 única vez planos que tenham os mesmos : name, localidade dando preferência
     *      quem possuir o schedule.startDate mais recente.
     *      Note que o campo localidade possui uma hierarquia (PAÍS -> ESTADO -> CIDADE). Esta hierarquia deverá ser
     *      respeitada, de maneira que a cidade terá maior prioridade que estado e  país.
     *    - O sistema só poderá exibir 1 única vez planos que tenham os mesmos : name  dando preferência a hierarquia de localidades.

     * @param object[] $dados
     * @return mixed
     */
    public static function filtrar($dados)
    {
        //filtrar o schedule.startDate
        $retorno = [];
        foreach ($dados as $dado)
        {
            if (static::isDataMenor($dado->schedule->startDate)) {
                $retorno[] = $dado;
            }
        }
        //mesmos nomes e localidade pelo schedule.startDate maior
        $tmpPlano = [];
        foreach ($retorno as $dado)
        {
            if (!array_key_exists($dado->name, $tmpPlano)) {
                $tmpPlano[$dado->name] = $dado;
            } else {

                //verifica a prioridade
                $tmp = $tmpPlano[$dado->name];
                if ($dado->localidade->prioridade == $tmp->localidade->prioridade) {
                    //se a localidade for igual, compara a startDate
                    if (static::isDataMenor($tmp->schedule->startDate, $dado->schedule->startDate)) {
                        $tmpPlano[$dado->name] = $dado;
                    }
                } else if ($dado->localidade->prioridade > $tmp->localidade->prioridade) {
                    $tmpPlano[$dado->name] = $dado;
                }
            }
        }
        $retorno = array_values($tmpPlano);

        return $retorno;
    }

    /**
     * Verificar se a primeira data é menor que a segunda data informada
     * @param string $data1 A data que vai ser comparada com a segunda data
     * @param string $data2 Caso não seja informado, considera a data de hoje
     * @return bool
     */
    public static function isDataMenor($data1, $data2 = 'now')
    {
        return (strtotime($data1) < strtotime($data2));
    }

    public static function formataMoeda($valor)
    {
        return "R$ " . number_format($valor,2,',','.');
    }

    public static function formataData($data, $formato = 'd/m/Y')
    {
        try {
            return date($formato, strtotime($data));
        } catch (\Exception $e) {
            return $data;
        }
    }

    /**
     * Retorna um nome amigável para o campo type
     * @param $tipo
     * @return string
     */
    public static function normalizaTipo($tipo)
    {
        switch ($tipo) {
            case 'pos':
                return 'Pós-Pago';
            case 'pre':
                return 'Pré-Pago';
            default:
                return mb_convert_case($tipo, MB_CASE_TITLE);
        }
    }

    public static function imprimeTabela($dados)
    {
        ?>
        <table class="table">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Tipo</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Preço no Plano</th>
                <th>Parcelas</th>
                <th>Valor Mensal</th>
                <th>Data Inicial</th>
                <th>Localidade</th>
                <th>Prioridade</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!count($dados)) {
                ?>
                <tr>
                    <td colspan="10">Nenhum dado foi encontrado!</td>
                </tr>
                <?php
            }
            foreach ($dados as $plan) {
                ?>
                <tr>
                    <td><?= $plan->id ?></td>
                    <td><?= Utils::normalizaTipo($plan->type) ?></td>
                    <td><?= $plan->name ?></td>
                    <td><?= Utils::formataMoeda($plan->phonePrice) ?></td>
                    <td><?= Utils::formataMoeda($plan->phonePriceOnPlan) ?></td>
                    <td><?= $plan->installments ?></td>
                    <td><?= Utils::formataMoeda($plan->monthly_fee) ?></td>
                    <td><?= Utils::formataData($plan->schedule->startDate) ?></td>
                    <td><?= $plan->localidade->nome ?></td>
                    <td><?= $plan->localidade->prioridade ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    <?php
    }

    public static function debug(...$vars)
    {
        echo '<pre>';
        foreach ($vars as $var) {
            echo "-------\n";
            if (is_bool($var) || is_null($var)) {
                var_dump($var);
            } else {
                print_r($var);
                echo "\n";
            }
        }
        echo '</pre>';
    }
}