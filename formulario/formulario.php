<?php include "auxiliar.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulário</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <h1 class="page-header">Formulário de inscrição</h1>

                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
                    <?php if (!$erro) : ?>
                        <?php $cargos = array(
                            "ENGANADOR DE CHEFE", "ENROLADOR DE TRABALHO", "PENSADOR",
                            "ANALISTA DE SISTEMAS", "DEGUSTADOR DE CERVEJA", "TECNICO EM REDES",
                            "CONTADOR DE ESTORIAS", "SAI DA AULA ANTES", "AÇOUGUEIRO LIMPINHO",
                            "SEGURANÇA DE BANHEIRO", "GESTOR DE BORBOLETAS", "AGENTE LEVA E TRAZ"
                        ); ?>
                        <div class="alert alert-success">
                            Dados recebidos com sucesso!
                            <ul>
                                <li><strong>Número</strong>: <?php echo intval($numero) ?>;</li>
                                <li><strong>Nome</strong>: <?php echo $nome ?>;</li>
                                <li><strong>CPF</strong>: <?php echo $cpf ?>;</li>
                                <li><strong>Dia</strong>: <?php echo intval($dia) ?>;</li>
                                <li><strong>Mes</strong>: <?php echo intval($mes) ?>;</li>
                                <li><strong>Ano</strong>: <?php echo intval($ano) ?>;</li>
                                <li><strong>Cargo</strong>: <?php echo $cargos[intval($cargo - 1)] ?>;</li>
                                <?php // limpa o formulário.
                                $nome = $cpf = $dia = $mes = $ano = $numero = "";
                                ?>
                            </ul>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-danger">
                            Erros no formulário!
                        </div>
                    <?php endif; ?>
                <?php endif; ?>



                <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                    <div class="form-group <?php if (!empty($erro_numero)) {
                                                echo "has-error";
                                            } ?>">
                        <label for="inputNumero" class="col-sm-2 control-label">Numero</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="numero" placeholder="Número de inscrição" value="<?php echo $numero; ?>">
                            <?php if (!empty($erro_numero)) { ?>
                                <span class="help-block"><?php echo $erro_numero ?></span>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (!empty($erro_nome)) {
                                                echo "has-error";
                                            } ?>">
                        <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $nome; ?>">
                            <?php if (!empty($erro_nome)) { ?>
                                <span class="help-block"><?php echo $erro_nome ?></span>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (!empty($erro_cpf)) {
                                                echo "has-error";
                                            } ?>">
                        <label for="inputCpf" class="col-sm-2 control-label">CPF</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cpf" placeholder="CPF" value="<?php echo $cpf; ?>">
                            <?php if (!empty($erro_cpf)) : ?>
                                <span class="help-block"><?php echo $erro_cpf ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (!empty($erro_dia)) {
                                                echo "has-error";
                                            } ?>">
                        <label for="inputDia" class="col-sm-2 control-label">Dia</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dia" placeholder="Dia" value="<?php echo $dia; ?>">
                            <?php if (!empty($erro_dia)) : ?>
                                <span class="help-block"><?php echo $erro_dia ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (!empty($erro_mes)) {
                                                echo "has-error";
                                            } ?>">
                        <label for="inputMes" class="col-sm-2 control-label">Mês</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="mes" placeholder="Mês" value="<?php echo $mes; ?>">
                            <?php if (!empty($erro_mes)) : ?>
                                <span class="help-block"><?php echo $erro_mes ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (!empty($erro_ano)) {
                                                echo "has-error";
                                            } ?>">
                        <label for="inputAno" class="col-sm-2 control-label">Ano</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ano" placeholder="Ano" value="<?php echo $ano; ?>">
                            <?php if (!empty($erro_ano)) : ?>
                                <span class="help-block"><?php echo $erro_ano ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <h2>Escolha seu cargo:</h2>


                    <select name="cargo">
                        <option value="1">1 - ENGANADOR DE CHEFE</option>
                        <option value="2">2 - ENROLADOR DE TRABALHO</option>
                        <option value="3">3 - PENSADOR</option>
                        <option value="4">4 - ANALISTA DE SISTEMAS</option>
                        <option value="5">5 - DEGUSTADOR DE CERVEJA</option>
                        <option value="6">6 - TECNICO EM REDES</option>
                        <option value="7">7 - CONTADOR DE ESTORIAS</option>
                        <option value="8">8 - SAI DA AULA ANTES</option>
                        <option value="9">9 - AÇOUGUEIRO LIMPINHO</option>
                        <option value="10">10 - SEGURANÇA DE BANHEIRO</option>
                        <option value="11">11 - GESTOR DE BORBOLETAS</option>
                        <option value="12">12 - AGENTE LEVA E TRAZ</option>
                    </select><br><br>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Enviar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>