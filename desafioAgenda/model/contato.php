<?php

class Contato {
    public $nome;
    public $telefone;
    public $data;

    public function __construct($nome, $telefone, $data) {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->data = $data;
    }
}