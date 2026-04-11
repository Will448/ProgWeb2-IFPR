<?php
session_start();

require_once __DIR__ . '/../controller/livroController.php';

$controller = new LivroController();

// 🔥 INSERIR + REDIRECT
if ($_POST && !isset($_POST['editar'])) {
    $controller->salvar($_POST);

    $_SESSION['msg'] = "Livro cadastrado com sucesso!";
    header("Location: livro.php");
    exit;
}

// LISTAR
$livros = $controller->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-light">

<!-- 🔝 NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">📖 Livros</span>

        <a href="../dashboard.php" class="btn btn-danger">
            ⬅ Voltar
        </a>
    </div>
</nav>

<div class="container mt-5">

    <!-- ✅ MENSAGEM -->
    <?php if (isset($_SESSION['msg'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['msg']; ?>
        </div>
        <?php unset($_SESSION['msg']); ?>
    <?php endif; ?>

    <div class="row">

        <!-- 📌 FORM -->
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h4 class="mb-3">Cadastrar</h4>

                <form method="POST">
                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Autor</label>
                        <input type="text" name="autor" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="disponivel">Disponível</option>
                            <option value="emprestado">Emprestado</option>
                        </select>
                    </div>

                    <button class="btn btn-primary w-100">Salvar</button>
                </form>
            </div>
        </div>

        <!-- 📊 TABELA -->
        <div class="col-md-8">
            <div class="card p-3 shadow-sm">
                <h4 class="mb-3">Lista de Livros</h4>

                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Autor</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($l = $livros->fetch_assoc()): ?>
                            <tr>
                                <td><?= $l['id'] ?></td>
                                <td><?= $l['nome'] ?></td>
                                <td><?= $l['autor'] ?></td>

                                <td>
                                    <?php if ($l['status'] == 'disponivel'): ?>
                                        <span class="badge bg-success">Disponível</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Emprestado</span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <!-- ✏️ EDITAR -->
                                    <button
                                        class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar"
                                        onclick="preencherModal(
                                            <?= $l['id'] ?>,
                                            '<?= addslashes($l['nome']) ?>',
                                            '<?= addslashes($l['autor']) ?>',
                                            '<?= $l['status'] ?>'
                                        )"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <!-- 🗑️ EXCLUIR -->
                                    <a
                                        href="../controller/livroController.php?deletar=<?= $l['id'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Deseja excluir?')"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>

</div>

<!-- 🔥 MODAL -->
<div class="modal fade" id="modalEditar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="../controller/livroController.php">

                <div class="modal-header">
                    <h5 class="modal-title">Editar Livro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="id" id="edit_id">

                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" id="edit_nome" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Autor</label>
                        <input type="text" name="autor" id="edit_autor" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" id="edit_status" class="form-select">
                            <option value="disponivel">Disponível</option>
                            <option value="emprestado">Emprestado</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="editar" class="btn btn-success">
                        Salvar
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- JS -->
<script>
function preencherModal(id, nome, autor, status) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_nome').value = nome;
    document.getElementById('edit_autor').value = autor;
    document.getElementById('edit_status').value = status;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>