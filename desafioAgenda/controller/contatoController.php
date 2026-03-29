<?php
require_once __DIR__ . "/../model/contato.php";

class ContatoController {

    public function index() {
        // ✅ Extrai os contatos da sessão antes de carregar a view
        $contatos = $_SESSION['contatos'] ?? []; //faz a leitura dos contatos armazenados na sessão, ou retorna um array vazio se não houver nenhum contato cadastrado.
        require __DIR__ . "/../view/formulario.php";
    }

    public function adicionar() {
        if (!isset($_SESSION['contatos'])) {
            $_SESSION['contatos'] = [];
        }

        $contato = new Contato(
            $_POST['nome'],
            $_POST['telefone'],
            $_POST['data']
        );

        $_SESSION['contatos'][] = $contato;

        header("Location: /ProgWeb2/desafioAgenda/index.php");
        exit();
    }

    public function limpar() {
        session_destroy(); // session_unset(); // alternativa para limpar a sessão sem destruí-la completamente
        header("Location: /ProgWeb2/desafioAgenda/index.php");
        exit();
    }
}