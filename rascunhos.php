<?php

$myfile = fopen("cand.txt", "r") or die("Unable to open file!");

while (!feof($myfile)) {
    $linha = fgets($myfile);
    $num =  substr($linha, 0, 4);
    $nome =  substr($linha, 4, 35);
    $cpf =  substr($linha, 39, 11);
    $dia =  substr($linha, 50, 2);
    $mes =  substr($linha, 52, 2);
    $ano =  substr($linha, 54, 4);
    $cargo =  substr($linha, 58, 2);

    $num = intval($num);
    $ano = intval($ano);
    $mes = intval($mes);
    $dia = intval($dia);
    $cargo = intval($cargo);

    echo $num;
    echo $ano;
    echo $mes;
    echo $dia;
    echo $cargo;
    echo "<br>";
}

fclose($myfile);
