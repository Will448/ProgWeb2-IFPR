<?php
require_once '../model/livroModel.php';

class LivroController {
    private $model;

    public function __construct() {
        $this->model = new LivroModel();
    }

    // 📚 Listar livros
    public function listar() {
        return $this->model->listar();
    }

    // 🔥 Listar disponíveis (opcional)
    public function listarDisponiveis() {
        return $this->model->listarDisponiveis();
    }

    // ➕ Salvar livro
    public function salvar($dados) {
        return $this->model->inserir(
            $dados['nome'],
            $dados['autor'],
            $dados['status']
        );
    }

    // ✏️ Atualizar
    public function atualizar($dados) {
        return $this->model->atualizar(
            $dados['id'],
            $dados['nome'],
            $dados['autor'],
            $dados['status']
        );
    }

    // ❌ Deletar
    public function deletar($id) {
        return $this->model->deletar($id);
    }
}

/* 🚀 Execução direta (formulário) */

$controller = new LivroController();

// UPDATE
if (isset($_POST['editar'])) {
    $controller->atualizar($_POST);
    header("Location: ../view/livro.php");
    exit;
}

// DELETE
if (isset($_GET['deletar'])) {
    $controller->deletar($_GET['deletar']);
    header("Location: ../view/livro.php");
    exit;
}

// INSERT
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->salvar($_POST);
    header("Location: ../view/livro.php");
    exit;
}

