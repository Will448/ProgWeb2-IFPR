<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "progweb2";

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>