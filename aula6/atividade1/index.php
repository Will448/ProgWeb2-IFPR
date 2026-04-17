<?php
include("recuperar.php");
?>

<?php include("cabecalho.html"); ?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>

    <?php foreach ($livros as $livro): ?>
        <tr>
            <td><?= $livro['id'] ?></td>
            <td><?= $livro['nome'] ?></td>
            <td><?= $livro['autor'] ?></td>
            >
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>