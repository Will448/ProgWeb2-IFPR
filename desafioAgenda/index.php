<?php
require_once "model/contato.php";
require_once "controller/contatoController.php";

session_start();

$controller = new ContatoController();

$acao = $_GET['acao'] ?? 'index';

switch ($acao) {
    case 'adicionar':
        $controller->adicionar();
        break;

    case 'limpar':
        $controller->limpar();
        break;

    default:
        $controller->index();
        break;
}