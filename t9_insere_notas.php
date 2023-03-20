<!DOCTYPE html>
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
        $sql = "INSERT INTO Notas (num, nota1, nota2, nota3, nota4, nota5, nota6, somaNotas)
        VALUES ($num, $notas[0], $notas[1], $notas[2], $notas[3], $notas[4], $notas[5], $som);";
    } else {
        $sql .= "INSERT INTO Notas (num, nota1, nota2, nota3, nota4, nota5, nota6, somaNotas)
        VALUES ($num, $notas[0], $notas[1], $notas[2], $notas[3], $notas[4], $notas[5], $som);";
    }

    $cont = $cont + 1;
}

fclose($myfile);


if (mysqli_multi_query($conn, $sql)) {
    echo "Notas inseridas com sucesso!!<br><br>";
} else {
    echo "Erro ao inserir notas: " . $sql . "<br><br>" . mysqli_error($conn) . "<br><br>";
};

mysqli_close($conn);

echo "Vejamos como ficam as médias por disciplina:" . "<br><br>";
echo "LÍNGUA ESTRANGEIRA MODERNA:" . $soma[0] / $cont . "<br>";
echo "MATEMÁTICA:" . $soma[1] / $cont . "<br>";
echo "LÓGICA:" . $soma[2] / $cont . "<br>";
echo "CONHECIMENTOS ESPECÍFICOS:" . $soma[3] / $cont . "<br>";
echo "INFORMÁTICA:" . $soma[4] / $cont . "<br>";
echo "ATUALIDADES" . $soma[5] / $cont . "<br>";
