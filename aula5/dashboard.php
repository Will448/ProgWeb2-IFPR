<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- 🔝 CABEÇALHO -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">📚 Sistema Biblioteca</span>

        <!-- 🔙 BOTÃO VOLTAR -->
        <a href="../index.html" class="btn btn-danger">
            ⬅ Voltar
        </a>
    </div>
</nav>

<div class="container mt-5">

<h1 class="mb-5 text-center">Dashboard</h1>

<div class="row text-center">

    <!-- EMPRÉSTIMO -->
    <div class="col-md-4 mb-4">
        <div class="card p-4 shadow-sm">
            <h3>📚 Empréstimos</h3>
            <p>Gerenciar empréstimos</p>
            <a href="./view/emprestimo.php" class="btn btn-primary">
                Acessar
            </a>
        </div>
    </div>

    <!-- PESSOAS -->
    <div class="col-md-4 mb-4">
        <div class="card p-4 shadow-sm">
            <h3>👤 Pessoas</h3>
            <p>Cadastrar e listar pessoas</p>
            <a href="./view/pessoa.php" class="btn btn-success">
                Acessar
            </a>
        </div>
    </div>

    <!-- LIVROS -->
    <div class="col-md-4 mb-4">
        <div class="card p-4 shadow-sm">
            <h3>📖 Livros</h3>
            <p>Cadastrar e listar livros</p>
            <a href="./view/livro.php" class="btn btn-warning">
                Acessar
            </a>
        </div>
    </div>

</div>

</div>

</body>
</html>