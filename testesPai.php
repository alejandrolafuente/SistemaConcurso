<?php
require_once "credentials.php";

// O ATRIBUTO "id" DO BD GUARDA A 'POSIÇÃO FÍSICA' DO REGISTRO, É NOSSA REFERÊNCIA
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica conexão
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$contclger = 1;
$sql = "UPDATE Candidato SET clg = 1 WHERE id = '13';";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
