<?php
include("conexao.php");

$id = $_GET['id'];

// prepared statement (blind)
$stmt = $conn->prepare("DELETE FROM livros WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Erro ao excluir: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>