<?php include "auxiliar2.php"; ?>
<?php

function valida_numero($num)
{
    $inteiro = strval($num);
    if (($inteiro > 0) and ($inteiro <= 9999)) {
        return true;
    } else {
        return false;
    }
}

function valida_cpf($cpf)
{
    if (strlen($cpf) != 11) { // primeiro verifica se a string digitada tem 11 char
        return false;
    } else {
        if (verifica_cpf($cpf)) {
            return true;
        } else {
            return false;
        }
    }
}
