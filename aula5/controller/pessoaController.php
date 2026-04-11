<?php
require_once __DIR__ . '/../model/PessoaModel.php';

class PessoaController {
    private $model;

    public function __construct() {
        $this->model = new PessoaModel();
    }

    // ➕ Inserir
    public function salvar($dados) {
        return $this->model->inserir(
            $dados['cpf'],
            $dados['nome'],
            $dados['telefone']
        );
    }

    // 📋 Listar
    public function listar() {
        return $this->model->listar();
    }

    // ✏️ Atualizar
    public function atualizar($dados) {
    return $this->model->atualizar(
        $dados['id'],
        $dados['cpf'],
        $dados['nome'],
        $dados['telefone']
        );
    }

    // ❌ Deletar
    public function deletar($id) {
        return $this->model->deletar($id);
    }
}



$controller = new PessoaController();

// UPDATE
if (isset($_POST['editar'])) {
    $resultado = $controller->atualizar($_POST);

    if ($resultado === "cpf_duplicado") {
        $_SESSION['erro'] = "CPF já cadastrado!";
    } else {
        $_SESSION['msg'] = "Atualizado com sucesso!";
    }

    header("Location: ../view/pessoa.php");
    exit;
}

// DELETE
if (isset($_GET['deletar'])) {
    $controller->deletar($_GET['deletar']);
    header("Location: ../view/pessoa.php");
    exit;
}

//  INSERT
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->salvar($_POST);
    header("Location: ../view/pessoa.php");
    exit;
}

