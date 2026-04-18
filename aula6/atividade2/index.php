<?php
include("recuperar.php");
?>

<?php include("cabecalho.html"); ?>

<a href="cadastroLivro.php">Cadastrar Novo Livro</a>
<hr>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Status</th>
        <th>Data</th>
    </tr>

    <?php foreach ($livros as $livro): ?>
        <tr>
            <td><?= $livro['id'] ?></td>
            <td><?= $livro['nome'] ?></td>
            <td><?= $livro['autor'] ?></td>
            <td><?= $livro['status'] ?></td>
            <td><?= $livro['data'] ?></td>
        </tr>
        
    <?php endforeach; ?>
</table>

</body>
</html>