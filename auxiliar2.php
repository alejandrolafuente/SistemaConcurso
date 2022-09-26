<?php

function converte($cpf)
{
    for ($i = 0; $i < strlen($cpf); $i++) {
        $vetor[$i + 1] = intval($cpf[$i]);
    }
    return $vetor;
}

function calcula_j($vetor_cpf)
{
    $soma = 0;
    for ($i = 1; $i <= 9; $i++) {
        $soma = $soma + ($vetor_cpf[$i] * (11 - $i));
    }
    $resto = ($soma % 11);
    if (($resto == 0) || ($resto == 1)) {
        $j = 0;
    } else {
        $j = 11 - $resto;
    }
    return $j;
}

function calcula_k($vetor_cpf)
{
    $soma = 0;
    for ($i = 1; $i <= 10; $i++) {
        $soma = $soma + $vetor_cpf[$i] * (12 - $i);
    }
    $resto = ($soma % 11);
    if (($resto == 0) or ($resto == 1)) {
        $k = 0;
    } else {
        $k = 11 - $resto;
    }
    return $k;
}

function verifica_cpf($cpf)
{
    $stringaux = "0123456789";
    $eh_valido = true;
    $i =  0;
    // a ideia é percorrer $cpf e comparar cada elemento com cada elemento de $stringaux

    while (($i < strlen($cpf)) and ($eh_valido)) {
        $cont = 0;
        for ($l = 0; $l < strlen($stringaux); $l++) {
            if ($cpf[$i] == $stringaux[$l]) { // se achou igual, interrompe laço
                break;
            } else {
                $cont = $cont + 1;
            }
            if ($cont == 10) { // percorreu $stringaux e não achou o elemento procurado
                $eh_valido = false;
                break;
            }
        };
        $i = $i + 1;
    }
    if (!$eh_valido) {
        return false;
    } else {
        $vetor_cpf = converte($cpf); // converte a string $cpf para um vetor de inteiros
        // até aqui tudo certo!!
        if (calcula_j($vetor_cpf) <> $vetor_cpf[10]) {
            return false;
        } else {
            if (calcula_k($vetor_cpf) <> $vetor_cpf[11]) {
                return false;
            } else {
                return true;
            }
        }
    }
}

// $vetor_cpf = 
