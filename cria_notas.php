<?php


$myfile = fopen("prova.txt", "r") or die("Unable to open file!");
$myfile1 = fopen("notas.txt", "w") or die("Unable to open file!");

$gaba = "CAECAADADEACCABDABAADEADEABBABDAADAABADAADDADEABAABBADEADBAB";
$questoes = array(); // vetor que guarda o no. de questões por disciplina
$questoes[0] = 5;
$questoes[1] = 10;
$questoes[2] = 10;
$questoes[3] = 20;
$questoes[4] = 10;
$questoes[5] = 5;

$notas = array();

$aux = 0;
while (!feof($myfile)) { // laço que percorre o arquivo "prova.txt"
    $reg2 = "";
    $posi = 0;
    $contaTotalQuestoes = 0;

    $reg1 = fgets($myfile);

    $num_insc =  substr($reg1, 0, 4);

    $reg2 .= $num_insc;

    for ($x = 0; $x < 6; $x++) {
        $ce = 0;
        $posi = $posi + 4;

        for ($i = 0; $i < $questoes[$x]; $i++) {
            if ($gaba[$contaTotalQuestoes] == $reg1[$contaTotalQuestoes + 4]) {
                $ce = $ce + 1;
            }
            $contaTotalQuestoes = $contaTotalQuestoes + 1;
        }

        $notas[$x] = $ce * intval(100 / $questoes[$x]);
        $nota = strval($notas[$x]);
        $nota = str_pad($nota, 4, ' ', STR_PAD_LEFT);

        $reg2 .= $nota;
    }
    if (!feof($myfile)) {
        $reg2 .= "\n";
    }
    fwrite($myfile1, $reg2);
}

fclose($myfile);
fclose($myfile1);
