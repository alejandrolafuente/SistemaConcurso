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

$sql = "SELECT id,nome,cargo FROM Candidato WHERE ccl <> 0;";


$result = mysqli_query($conn, $sql);

// Montamos o vetor:

if (mysqli_num_rows($result) > 0) { // quantas linhas tem a variável $result?
    // Dados de saída de cada linha
    while ($row = mysqli_fetch_assoc($result)) { // retorna uma linha a cada chamada
        $vetor[$cont] = new Candidato();
        $vetor[$cont]->id = $row["id"];
        $cargo = strval($row["cargo"]);

        if ($cargo < 10) {
            $cargo = str_pad($cargo, 2, '0', STR_PAD_LEFT);
        }

        $vetor[$cont]->campoChave = $cargo . $row["nome"];
        $cont = $cont + 1;
    }
} else {
    echo "0 resultados" . "<br>";
}

$cont = $cont - 1;

$vetor = ordena($vetor, count($vetor));
$anterior = 0;

for ($i = 0; $i < count($vetor); $i++) {
    $cadeia = strval($vetor[$i]->id);
    $sql = "SELECT nome,numInscricao,ano,mes,dia,cargo FROM Candidato WHERE id = '$cadeia'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($anterior != $row["cargo"]) {
        echo "<br><br>";
    }
    $anterior = $row["cargo"];
    echo $row["cargo"] . "--" . "Num:" . $row["numInscricao"] . "--Nome: " . $row["nome"] . "  --Nascimento:" . $row["dia"] . "/" . $row["mes"] . "/" . $row["ano"] .  "<br>";
}

mysqli_close($conn);
