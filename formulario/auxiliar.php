<?php

ini_set('display_errors', 1);

require_once  'ValidaNumero.php';
require_once  'ValidaCPF.php';
require_once  'ValidaAno.php';
require_once  'ValidaMes.php';
require_once  'ValidaDia.php';

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
        $num = intval($numero);
        $validadorNumInscricao = new ValidaNumero($num);
        $respostaNum = $validadorNumInscricao->valida();
        if (!$respostaNum) {
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
        $validadorDeCPF = new ValidaCPF($cpf);
        $respostaCPF = $validadorDeCPF->valida();
        if (!$respostaCPF) {
            $erro_cpf = "CPF inválido!";
            $erro = true;
        }
    }

    if (empty($_POST["ano"])) {
        $erro_ano = "Ano é obrigatório.";
        $erro = true;
    } else {
        $ano = verifica_campo($_POST["ano"]);
        $ano = intval($ano);
        $validadorAnoNascimento = new ValidaAno($ano);
        $respostaAno = $validadorAnoNascimento->valida();
        if (!$respostaAno) {
            $erro_ano = "Ano inválido! Por favor digite um ano posterior a  1900.";
            $erro = true;
        }
    }

    if (empty($_POST["mes"])) {
        $erro_mes = "Mês é obrigatório.";
        $erro = true;
    } else {
        $mes = verifica_campo($_POST["mes"]);
        $mes = intval($mes);
        $validadorMesNascimento = new ValidaMes($mes);
        $respostaMes = $validadorMesNascimento->valida();
        if (!$respostaMes) {
            $erro_mes = "Mês inválido!";
            $erro = true;
        }
    }

    if (empty($_POST["dia"])) {
        $erro_dia = "Dia é obrigatório.";
        $erro = true;
    } else {
        $dia = verifica_campo($_POST["dia"]);
        $dia = intval($dia);
        $validadorDiaNascimento = new ValidaDia($dia, $validadorAnoNascimento->getAno(), $validadorMesNascimento->getMes());
        $respostaDia = $validadorDiaNascimento->valida();
        if (!$respostaDia) {
            $erro_dia = "Dia inválido!";
            $erro = true;
        }
    }

    if (empty($_POST["cargo"])) {
        $erro_cargo = "Cargo é obrigatório.";
        $erro = true;
    } else {
        $cargo = $_POST["cargo"];
    }
}
