<?php
require_once '../controller/livroController.php';
require_once '../controller/pessoaController.php';

$livroController = new LivroController();
$pessoaController = new PessoaController();

$livros = $livroController->listar();
$pessoas = $pessoaController->listar();

// ✅ Corrige o problema do loop
$pessoasArray = [];
while($p = $pessoas->fetch_assoc()){
    $pessoasArray[] = $p;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Empréstimos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="mb-4">Empréstimo de Livros</h2>

<div class="row">

<?php while($l = $livros->fetch_assoc()): ?>
    
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm">

            <!-- IMAGEM DO LIVRO -->
            <img src="https://via.placeholder.com/150" class="card-img-top">

            <div class="card-body">
                <h5 class="card-title"><?= $l['nome'] ?></h5>
                <p class="card-text"><?= $l['autor'] ?></p>

                <!-- FORM DE EMPRÉSTIMO -->
                <form method="POST" action="../controller/emprestimoController.php">
                    
                    <input type="hidden" name="livro_id" value="<?= $l['id'] ?>">

                    <select name="pessoa_id" class="form-select mb-2" required>
                        <option value="">Selecione a pessoa</option>

                        <?php foreach($pessoasArray as $p): ?>
                            <option value="<?= $p['id'] ?>">
                                <?= $p['nome'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button class="btn btn-success w-100">
                        Emprestar
                    </button>

                </form>
            </div>

        </div>
    </div>

<?php endwhile; ?>

</div>

</div>

</body>
</html>