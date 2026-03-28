<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda MVC</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h1 class="mb-4">Agenda</h1>

<div class="card p-4 mb-4">

    <h4>Novo Contato</h4>

    <form action="/ProgWeb2/desafioAgenda/index.php?acao=adicionar" method="POST">

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Data</label>
            <input type="date" name="data" class="form-control" required>
        </div>

        <button class="btn btn-primary">Adicionar</button>
        <a href="/ProgWeb2/desafioAgenda/index.php?acao=limpar" class="btn btn-danger">Limpar</a>

    </form>

</div>

<div class="card p-4">

    <h4>Lista de Contatos</h4>

    <?php require __DIR__ . "/lista.php"; ?>

</div>

</body>
</html>