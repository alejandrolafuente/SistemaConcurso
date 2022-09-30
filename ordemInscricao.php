<?php
require_once "credentials.php";


// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

class Candidato
{
    public $id;
    public $nome;
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
            if (($vet[$a]->nome) > ($vet[$a + 1]->nome)) {
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

$sql = "SELECT id, num FROM Candidato";


$result = mysqli_query($conn, $sql);

// Montamos o vetor:
if (mysqli_num_rows($result) > 0) { // quantas linhas tem a variável $result?
    // Dados de saída de cada linha
    while ($row = mysqli_fetch_assoc($result)) { // retorna uma linha a cada chamada
        $vetor[$cont] = new Candidato();
        $vetor[$cont]->id = $row["id"];
        $vetor[$cont]->nome = $row["num"];
        $cont = $cont + 1;
    }
} else {
    echo "0 resultados";
}

$vetor = ordena($vetor, $cont);

// imprime o vetor:
/*for ($i = 0; $i < count($vetor); $i++) {
    echo $vetor[$i]->id . " ";
    echo $vetor[$i]->nome;
    echo "<br>";
}*/

// ==> Agora vamos percorrer o vetor e acessar o BD através dele, PARA ESTE CASO
// DE IMPRIMIR EM ORDEM ALFABÉTICA!!!!


for ($i = 0; $i < count($vetor); $i++) {
    $cadeia = strval($vetor[$i]->id);
    $sql = "SELECT id,num,nome FROM Candidato WHERE id = '$cadeia'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo "id: " . $row["id"] . "  " . " Num: " . $row["num"] . "  - Nome: " . $row["nome"] . "<br>";
}

mysqli_close($conn);

/*if (mysqli_num_rows($result) > 0) { // quantas linhas tem a variável $result?
    // Dados de saída de cada linha
    while ($row = mysqli_fetch_assoc($result)) { // retorna uma linha a cada chamada
        echo "id: " . $row["id"] . "  - Nome: " . $row["nome"] . "<br>";
    }
} else {
    echo "0 resultados";
}

mysqli_close($conn); */
