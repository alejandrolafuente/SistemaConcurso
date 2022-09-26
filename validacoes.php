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
