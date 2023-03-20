<?php
require_once "credentials.php";

// O ATRIBUTO "id" DO BD GUARDA A POSIÇÃO FÍSICA DO REGISTRO, É NOSSA REFERÊNCIA
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

class Candidato
{
    public $id;
    public $campoChave;
}

function ordena($vet, $t)
{
    $aux = new Candidato();
    $tot = $t;
    $jor = 1;
    $tro = false;
    while (!$tro) {
        $tro = true;
        $tot = $tot - $jor;
        for ($a = 0; $a < $tot; $a++) {
            if (($vet[$a]->campoChave) > ($vet[$a + 1]->campoChave)) {
                $aux = $vet[$a];
                $vet[$a] = $vet[$a + 1];
                $vet[$a + 1] = $aux;
                $tro = false;
                $jor = 1;
            } else {
                $jor = $jor + 1;
            }
        }
    }
    return $vet;
}

$cont = 0;
$vetor = array();

$sql = "SELECT id,clg FROM Candidato WHERE falta <=> NULL ;";


$result = mysqli_query($conn, $sql);

// Montamos o vetor:

if (mysqli_num_rows($result) > 0) { // quantas linhas tem a variável $result?
    // Dados de saída de cada linha
    while ($row = mysqli_fetch_assoc($result)) { // retorna uma linha a cada chamada
        $vetor[$cont] = new Candidato();
        $vetor[$cont]->id = $row["id"];


        $clasGeral = strval($row["clg"]);
        $clasGeral = str_pad($clasGeral, 4, '0', STR_PAD_LEFT);

        $vetor[$cont]->campoChave = $clasGeral;
        $cont = $cont + 1;
    }
} else {
    echo "0 resultados" . "<br>";
}

$vetor = ordena($vetor, count($vetor));

$cargos = [
    "", "Programador PHP", "Desenvolvedor Web Full Stack", "Programador Java",
    "Programador Python", "Programador C++", "Desenvolvedor front-end", "Desenvolvedor back-end",
    "Analista de Infraestrutura", "Analista de Suporte", "Analista de redes", "Analista de Cyber Security",
    "Engenheiro de Cloud Computing"
];

$cont = 1;
for ($i = 0; $i < count($vetor); $i++) {
    $cadeia = strval($vetor[$i]->id);
    $sql = "SELECT nome,numInscricao,cargo,ccl FROM Candidato WHERE id = '$cadeia'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $cargo = $row["cargo"];
    echo "Classificação: " . $cont .  "--Nome: " . $row["nome"];
    if ($row["ccl"] <> 0) {
        echo "-----***APROVADO***--" . $cargos[$cargo] . "<br>";
    } else {
        echo "<br>";
    }
    $cont = $cont + 1;
}

mysqli_close($conn);
