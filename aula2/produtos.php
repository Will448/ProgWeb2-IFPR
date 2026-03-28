

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Compra de Produto</title>
</head>
<body>

    <h2>Cadastro de Compra</h2>

    <form action="procProdutos.php" method="POST">

        <label>Nome do Produto:</label><br>
        <input type="text" name="produto" required><br><br>

        <label>Valor do Produto (R$):</label><br>
        <input type="number" name="valor" step="0.01" required><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="quantidade" required><br><br>

        <button type="submit">Calcular</button>

    </form>

</body>
</html>
