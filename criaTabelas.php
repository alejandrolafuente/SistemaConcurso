<!--- Script que cria a tabela Candidato no BD Concurso--->
<?php
require_once "credentials.php";

// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql para criação de tabela
$sql = "CREATE TABLE Candidato (
  id    INT(8) AUTO_INCREMENT PRIMARY KEY,
  numInscricao   INT NOT NULL,
  nome  VARCHAR(35) NOT NULL,
  cpf   VARCHAR(11),
  ano   VARCHAR(4) NOT NULL,
  mes   VARCHAR(2) NOT NULL,
  dia   VARCHAR(2) NOT NULL,
  cargo INT NOT NULL,
  clg   INT,
  clc   INT,
  ccl   INT,
  falta INT
)";


if (mysqli_query($conn, $sql)) {
    echo "Tabela candidato criada com sucesso!!<br>";
} else {
    echo "<br>Erro ao criar a tabela 'Candidato': " . mysqli_error($conn);
}

$sql = " CREATE TABLE Notas (
  id    INT(8) AUTO_INCREMENT PRIMARY KEY,
  num   INT NOT NULL,
  nota1 INT,
  nota2 INT,
  nota3 INT,
  nota4 INT,
  nota5 INT,
  nota6 INT,
  somaNotas INT,
  FOREIGN KEY (id) REFERENCES Candidato(id)
)";


if (mysqli_query($conn, $sql)) {
    echo "Tabela Notas criada com sucesso!!<br>";
} else {
    echo "<br>Erro ao criar a tabela 'Notas': " . mysqli_error($conn);
}

mysqli_close($conn);
