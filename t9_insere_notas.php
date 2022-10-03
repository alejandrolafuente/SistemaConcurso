<?php
require_once "credentials.php";

// Cria a conexão:
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verifica a conexão:
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$myfile = fopen("notas.txt", "r") or die("Unable to open file!");

$cont = 0;
$soma = array(0, 0, 0, 0, 0, 0);

while (!feof($myfile)) {

    $linha = fgets($myfile);
    $num_insc =  substr($linha, 0, 4);

    $num = intval($num_insc);

    $aux = strval($num);

    $ini = 5;
    $som = 0;
    $notas = array();

    for ($i = 0; $i < 6; $i++) {
        $notas[$i] = intval(substr($linha, $ini, 3));
        $som = $som + $notas[$i];
        $soma[$i] = $soma[$i] + $notas[$i];
        $ini = $ini + 4;
    }

    if ($cont == 0) {
        $sql = "UPDATE Candidato SET nota1 = $notas[0], nota2 = $notas[1], nota3 = $notas[2], nota4 = $notas[3], nota5 = $notas[4], nota6 = $notas[5], som = $som WHERE num = '$aux' ;";
    } else {
        $sql .= "UPDATE Candidato SET nota1 = $notas[0], nota2 = $notas[1], nota3 = $notas[2], nota4 = $notas[3], nota5 = $notas[4], nota6 = $notas[5], som = $som WHERE num = '$aux' ;";
    }

    $cont = $cont + 1;
}

fclose($myfile);


if (mysqli_multi_query($conn, $sql)) {
    echo "Notas inseridas com sucesso!!<br>";
} else {
    echo "Erro ao inserir notas: " . $sql . "<br><br>" . mysqli_error($conn);
};

mysqli_close($conn);
