<?php
include("conexao.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$autor = $_POST['autor'];
$status = $_POST['status'];
$data = $_POST['data'];

$stmt = $conn->prepare("UPDATE livros SET nome = ?, autor = ?, status = ?, data = ? WHERE id = ?");
$stmt->bind_param("ssssi", $nome, $autor, $status, $data, $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>