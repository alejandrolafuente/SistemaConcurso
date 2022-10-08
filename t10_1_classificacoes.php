<?php
require_once "credentials.php";

// O ATRIBUTO "id" DO BD GUARDA A 'POSIÇÃO FÍSICA' DO REGISTRO, É NOSSA REFERÊNCIA
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

class Candidato
{
    public $id;
    public $campoChave; // aqui colocaremos os critérios de desempate
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
$dataFutura = 20200101;

$sql = "SELECT id,ano,mes,dia,nota1,nota2,nota3,nota4,nota5,nota6,som,falta FROM Candidato";


$result = mysqli_query($conn, $sql);

// Montamos o vetor:
if (mysqli_num_rows($result) > 0) { // quantas linhas tem a variável $result?
    // Dados de saída de cada linha
    while ($row = mysqli_fetch_assoc($result)) { // retorna uma linha a cada chamada
        if ($row["falta"] != 1) {
            $vetor[$cont] = new Candidato();
            $vetor[$cont]->id = $row["id"];

            $som = strval($row["som"]);
            $som = str_pad($som, 3, ' ', STR_PAD_LEFT);
            $nota1 = strval($row["nota1"]);
            $nota1 = str_pad($nota1, 3, ' ', STR_PAD_LEFT);
            $nota2 = strval($row["nota2"]);
            $nota2 = str_pad($nota2, 3, ' ', STR_PAD_LEFT);
            $nota3 = strval($row["nota3"]);
            $nota3 = str_pad($nota3, 3, ' ', STR_PAD_LEFT);
            $nota4 = strval($row["nota4"]);
            $nota4 = str_pad($nota4, 3, ' ', STR_PAD_LEFT);
            $nota5 = strval($row["nota5"]);
            $nota5 = str_pad($nota5, 3, ' ', STR_PAD_LEFT);
            $nota6 = strval($row["nota6"]);
            $nota6 = str_pad($nota6, 3, ' ', STR_PAD_LEFT);

            $idade = $row["ano"] . $row["mes"] . $row["dia"];
            $idade = intval($idade);
            $idade = strval($dataFutura - $idade);

            $vetor[$cont]->campoChave = $som . $nota4 . $nota5 . $nota3 . $nota2 . $nota6 . $nota1 . $idade;
            $cont = $cont + 1;
        }
    }
} else {
    echo "0 resultados";
}


$vetor = ordena($vetor, $cont);

// imprime o vetor em ordem decrescente:
/*for ($i = count($vetor) - 1; $i >= 0; $i--) {
    echo $vetor[$i]->id . " ";
    echo $vetor[$i]->campoChave;
    echo "<br>";
}*/

// ==> Agora vamos percorrer o vetor e acessar o BD através dele, e fazer os 
// UPDATES dos campos clg, clc e ccl
$vagas = [0, 20, 15, 17, 18, 15, 20, 14, 12, 17, 18, 17, 20]; // numero de vagas por cargo
$vetclacar = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // vetor que contará em cada posição a classificação NO CARGO
$contclger = 0; // contador da classificação geral
$contcla = 0; // conta o número de classificados

$cont = 0;
$contcla = 0;
for ($i = count($vetor) - 1; $i >= 0; $i--) {
    $cadeia = strval($vetor[$i]->id);
    $sql = "SELECT cargo FROM Candidato WHERE id = '$cadeia'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $cargo = $row["cargo"];
    echo $cadeia . "---" . $cargo . "--";

    $contclger = $contclger + 1;
    $vetclacar[$cargo] = $vetclacar[$cargo] + 1;

    $sql = "UPDATE Candidato SET clc = $vetclacar[$cargo] WHERE id = '$cadeia' ;";
    $result = mysqli_query($conn, $sql);

    echo $contclger;
    echo "<br>";
    $sql = "UPDATE Candidato SET clg = $contclger WHERE id = '$cadeia' ;";
    $result = mysqli_query($conn, $sql);

    // $sql = "INSERT INTO Candidato (clg) VALUES ('$contclger') WHERE id = '$cadeia'";


    if ($vetclacar[$cargo] <= $vagas[$cargo]) {
        $contcla = $contcla + 1;
        $sql = "UPDATE Candidato SET ccl= $cargo WHERE id = '$cadeia' ;";
        $result = mysqli_query($conn, $sql);
    }
}

mysqli_close($conn);
