<?php
include("conexao.php");

$id = $_GET['id'];

// buscar o livro
$stmt = $conn->prepare("SELECT * FROM livros WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$livro = $resultado->fetch_assoc();

$stmt->close();
$conn->close();
?>

<?php include("cabecalho.html"); ?>

<h2>Editar Livro</h2>

<form action="atualiza.php" method="POST">
    <input type="hidden" name="id" value="<?= $livro['id'] ?>">

    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= $livro['nome'] ?>" required><br><br>

    <label>Autor:</label><br>
    <input type="text" name="autor" value="<?= $livro['autor'] ?>" required><br><br>

    <label>Status:</label><br>
    <select name="status" required>
        <option value="disponivel" <?= $livro['status'] == 'disponivel' ? 'selected' : '' ?>>Disponível</option>
        <option value="emprestado" <?= $livro['status'] == 'emprestado' ? 'selected' : '' ?>>Emprestado</option>
    </select><br><br>

    <label>Data:</label><br>
    <input type="date" name="data" value="<?= $livro['data'] ?>" required><br><br>

    <button type="submit">Atualizar</button>
</form>

<a href="index.php">Voltar</a>

</body>
</html>