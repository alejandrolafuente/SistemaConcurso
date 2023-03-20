<?php
$myfile = fopen("prova.txt", "r") or die("Unable to open file!");
$myfile1 = fopen("notas.txt", "w") or die("Unable to open file!");
$gaba = "CAECAADADEACCABDABAADEADEABBABDAADAABADAADDADEABAABBADEADBAB";
$questoes = array(5, 10, 10, 20, 10, 5); // vetor que guarda o no. de questões por disciplina
$notas = array();
$aux = 0;
while (!feof($myfile)) { // laço que percorre o arquivo "prova.txt"
    $reg2 = "";
    $contaTotalQuestoes = 0;
    $reg1 = fgets($myfile);
    $numInsc =  substr($reg1, 0, 4);
    $reg2 .= $numInsc;
    $respostas = substr($reg1, 4, 60);
    for ($x = 0; $x < 6; $x++) { // itera sobre cada uma das 6 disciplinas
        $acertos = 0; // conta o total de acertos de cada candidato por disciplina
        for ($i = 0; $i < $questoes[$x]; $i++) { // itera pelas respostas de cada disc.
            if ($gaba[$contaTotalQuestoes] == $respostas[$contaTotalQuestoes]) {
                $acertos = $acertos + 1;
            }
            $contaTotalQuestoes = $contaTotalQuestoes + 1;
        }
        $notas[$x] = $acertos * intval(100 / $questoes[$x]);
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
