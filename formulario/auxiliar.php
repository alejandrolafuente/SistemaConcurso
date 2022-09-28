<?php include "validacoes.php"; ?>
<?php
function verifica_campo($texto)
{
    $texto = trim($texto);
    $texto = stripslashes($texto);
    $texto = htmlspecialchars($texto);
    return $texto;
}

$numero = $nome = $cpf = $dia = $mes = $ano = $tipo = $curso = "";
$erro = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["numero"])) {
        $erro_numero = "Número de inscrição é obrigatório.";
        $erro = true;
    } else {
        $numero = verifica_campo($_POST["numero"]);
        if (!valida_numero($numero)) {
            $erro_numero = "Número de inscrição inválido!";
            $erro = true;
        }
    }


    if (empty($_POST["nome"])) {
        $erro_nome = "Nome é obrigatório.";
        $erro = true;
    } else {
        $nome = verifica_campo($_POST["nome"]);
    }

    if (empty($_POST["cpf"])) {
        $erro_cpf = "CPF é obrigatório.";
        $erro = true;
    } else {
        $cpf = verifica_campo($_POST["cpf"]);
        if (!valida_cpf($cpf)) {
            $erro_cpf = "CPF inválido!";
            $erro = true;
        }
    }

    if (empty($_POST["ano"])) {
        $erro_ano = "Ano é obrigatório.";
        $erro = true;
    } else {
        $ano = verifica_campo($_POST["ano"]);
        if (!valida_ano($ano)) {
            $erro_ano = "Ano inválido! Por favor digite um ano posterior a  1900.";
            $erro = true;
        }
    }

    if (empty($_POST["mes"])) {
        $erro_mes = "Mês é obrigatório.";
        $erro = true;
    } else {
        $mes = verifica_campo($_POST["mes"]);
        if (!valida_mes($mes)) {
            $erro_mes = "Mês inválido!";
            $erro = true;
        }
    }

    if (empty($_POST["dia"])) {
        $erro_dia = "Dia é obrigatório.";
        $erro = true;
    } else {
        $dia = verifica_campo($_POST["dia"]);
        if (!valida_dia($dia)) {
            $erro_dia = "Dia inválido!";
            $erro = true;
        }
    }

    if (empty($_POST["curso"])) {
        $erro_ano = "Curso é obrigatório.";
        $erro = true;
    } else {
        $curso = $_POST["curso"];
    }
}
