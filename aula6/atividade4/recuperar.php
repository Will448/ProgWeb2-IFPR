<?php
include("conexao.php");

$sql = "SELECT id, nome, autor, status, data FROM livros";
$resultado = $conn->query($sql);

$livros = [];

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        $livros[] = $linha;
    }
}

$conn->close();
?>