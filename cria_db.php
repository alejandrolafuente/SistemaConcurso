<!--- Script que cria a DB  Concurso--->
<?php
require_once "credentials.php";

// Cria a conexão
$conn = mysqli_connect($servername, $username, $password);

// Verifica a conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Cria o BD
$sql = "CREATE DATABASE $dbname";

if (mysqli_query($conn, $sql)) {
    echo "Sucesso na criação do BD!!!";
} else {
    echo "Erro ao criar o DB: " . mysqli_error($conn);
}



mysqli_close($conn);
