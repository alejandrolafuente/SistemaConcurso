<?php
require_once "credentials.php";


// Cria a conexão:
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verifica a conexão:
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$myfile = fopen("cand.txt", "r") or die("Unable to open file!");

$aux = 0;
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


    if ($aux == 0) {
        $sql = "INSERT INTO Candidato (num, nome, cpf, ano, mes, dia, cargo)
        VALUES ($num,'$nome','$cpf','$ano','$mes','$dia',$cargo);";
    } else {
        $sql .= "INSERT INTO Candidato (num, nome, cpf, ano, mes, dia, cargo)
        VALUES ($num,'$nome','$cpf','$ano','$mes','$dia',$cargo);";
    }

    $aux = $aux + 1;
}

fclose($myfile);


if (mysqli_multi_query($conn, $sql)) {
    echo "Registros inseridos com sucesso!!<br>";
} else {
    echo "Erro ao inserir registros: " . $sql . "<br><br>" . mysqli_error($conn);
}

echo "Total de registros iseridos: " . $aux;
mysqli_close($conn);
