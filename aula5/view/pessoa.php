<?php
session_start();

require_once __DIR__ . '/../controller/pessoaController.php';

$controller = new PessoaController();

// 🔥 INSERIR + REDIRECT
if ($_POST && !isset($_POST['editar'])) {
    $controller->salvar($_POST);

    $_SESSION['msg'] = "Pessoa cadastrada com sucesso!";
    header("Location: pessoa.php");
    exit;
}

// LISTAR
$pessoas = $controller->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pessoa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-light">

<!-- 🔝 NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">👤 Pessoas</span>

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
                        <label>CPF</label>
                        <input type="text" name="cpf" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Telefone</label>
                        <input type="text" name="telefone" class="form-control">
                    </div>

                    <button class="btn btn-primary w-100">Salvar</button>
                </form>
            </div>
        </div>

        <!-- 📊 TABELA -->
        <div class="col-md-8">
            <div class="card p-3 shadow-sm">
                <h4 class="mb-3">Lista de Pessoas</h4>

                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($p = $pessoas->fetch_assoc()): ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td><?= $p['nome'] ?></td>
                                <td><?= $p['cpf'] ?></td>
                                <td><?= $p['telefone'] ?></td>

                                <td>
                                    <!-- ✏️ EDITAR -->
                                    <button
                                        class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar"
                                        onclick="preencherModal(
                                            <?= $p['id'] ?>,
                                            '<?= addslashes($p['nome']) ?>',
                                            '<?= addslashes($p['cpf']) ?>',
                                            '<?= addslashes($p['telefone']) ?>'
                                        )"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <!-- 🗑️ EXCLUIR -->
                                    <a
                                        href="../controller/PessoaController.php?deletar=<?= $p['id'] ?>"
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

            <form method="POST" action="../controller/PessoaController.php">

                <div class="modal-header">
                    <h5 class="modal-title">Editar Pessoa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="id" id="edit_id">

                    <div class="mb-3">
                        <label>CPF</label>
                        <input type="text" name="cpf" id="edit_cpf" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" id="edit_nome" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Telefone</label>
                        <input type="text" name="telefone" id="edit_telefone" class="form-control">
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
function preencherModal(id, nome, cpf, telefone) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_nome').value = nome;
    document.getElementById('edit_cpf').value = cpf;
    document.getElementById('edit_telefone').value = telefone;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>