<?php
require_once "credentials.php";

// Cria a conexão:
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verifica a conexão:
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$myfile = fopen("faltas.txt", "r") or die("Unable to open file!");

$cont = 0;
while (!feof($myfile)) {

    $linha = fgets($myfile);

    $num = intval($linha);
    $aux = strval($num);

    if ($cont == 0) {
        $sql = "UPDATE Candidato SET falta = 1 WHERE numInscricao = '$aux' ;";
    } else {
        $sql .= "UPDATE Candidato SET falta = 1 WHERE numInscricao = '$aux' ;";
    }

    $cont = $cont + 1;
}

fclose($myfile);


if (mysqli_multi_query($conn, $sql)) {
    echo "Faltas inseridas com sucesso!!<br>";
    echo "Total de candidato ausentes: " . $cont;
} else {
    echo "Erro ao inserir faltas: " . $sql . "<br><br>" . mysqli_error($conn);
};

mysqli_close($conn);
