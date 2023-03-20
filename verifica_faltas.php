<?php
require_once "credentials.php";

// O ATRIBUTO "id" DO BD GUARDA A POSIÇÃO FÍSICA DO REGISTRO, É NOSSA REFERÊNCIA
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$sql = "SELECT numInscricao, nome FROM Candidato WHERE falta=1;";


$result = mysqli_query($conn, $sql);

// Montamos o vetor:
$vetor = array();
$i = 0;
if (mysqli_num_rows($result) > 0) { // quantas linhas tem a variável $result?
    // Dados de saída de cada linha
    while ($row = mysqli_fetch_assoc($result)) { // retorna uma linha a cada chamada
        $vetor[$i] =  $row["numInscricao"];
        $i = $i + 1;
    }
} else {
    echo "0 resultados";
}

sort($vetor);

for ($j = 0; $j < count($vetor); $j++) {
    echo $vetor[$j];
    echo "<br>";
}

echo "Total de faltantes: " . count($vetor);

mysqli_close($conn);
