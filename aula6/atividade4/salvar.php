<?php
include("conexao.php");

$nome = $_POST['nome']; 
$autor = $_POST['autor'];
$status = $_POST['status'];
$data = $_POST['data'];

$stmt = $conn->prepare("INSERT INTO livros (nome, autor, status, data) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $autor, $status, $data);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>