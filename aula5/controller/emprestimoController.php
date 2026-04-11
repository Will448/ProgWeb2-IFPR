<?php
require_once '../model/emprestimoModel.php';

class EmprestimoController {
    private $model;

    public function __construct() {
        $this->model = new EmprestimoModel();
    }

    // Criar empréstimo
    public function emprestar($dados) {
        return $this->model->emprestar(
            $dados['pessoa_id'],
            $dados['livro_id']
        );
    }

    // Listar
    public function listar() {
        return $this->model->listar();
    }

    // Devolver
    public function devolver($id) {
        return $this->model->devolver($id);
    }

    // Deletar
    public function deletar($id) {
        return $this->model->deletar($id);
    }
}

/* 🚀 Execução direta (quando chamado via POST/GET) */

$controller = new EmprestimoController();

// EMPRESTAR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $controller->emprestar($_POST);

    header("Location: ../view/emprestimo.php");
    exit;
}

// DEVOLVER
if (isset($_GET['devolver'])) {
    $controller->devolver($_GET['devolver']);

    header("Location: ../view/listar_emprestimos.php");
    exit;
}

// DELETAR
if (isset($_GET['deletar'])) {
    $controller->deletar($_GET['deletar']);

    header("Location: ../views/listar_emprestimos.php");
    exit;
}