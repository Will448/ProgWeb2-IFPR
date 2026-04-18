<?php include("cabecalho.html"); ?>

<h2>Cadastrar Novo Livro</h2>

<form action="salvar.php" method="POST">
    <label>Título:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Autor:</label><br>
    <input type="text" name="autor" required><br><br>

    <label>Status:</label><br>
    <select name="status" required>
        <option value="disponivel">Disponível</option>
        <option value="emprestado">Emprestado</option>
    </select><br><br>

    <label>Data:</label><br>
    <input type="date" name="data" lang="pt-BR"><br><br>

    <button type="submit">Cadastrar</button>
</form>

<a href="index.php">Voltar</a>

</body>
</html>