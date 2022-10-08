<?php
require_once "credentials.php";

// O ATRIBUTO "id" DO BD GUARDA A POSIÇÃO FÍSICA DO REGISTRO, É NOSSA REFERÊNCIA
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$sql = "SELECT id, nome FROM Candidato WHERE ccl <> 0;";


$result = mysqli_query($conn, $sql);

// Montamos o vetor:

$cont = 0;
echo "LISTA DE APROVADOS: " . "<br>";
echo "<br>";
echo "ID---NOME" . "<br>" . "<br>";
if (mysqli_num_rows($result) > 0) { // quantas linhas tem a variável $result?
    // Dados de saída de cada linha
    while ($row = mysqli_fetch_assoc($result)) { // retorna uma linha a cada chamada
        echo $row["id"] . "---" . $row["nome"] . "<br>";
        $cont = $cont + 1;
    }
} else {
    echo "0 resultados" . "<br>";
}


echo "Total de aprovados: " . $cont;

mysqli_close($conn);
