<?php
require_once '../database/conexaoBd.php';

class PessoaModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    // CREATE
    public function inserir($cpf, $nome, $telefone) {
        $sql = "INSERT INTO Pessoa (cpf, nome, telefone) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $cpf, $nome, $telefone);
        return $stmt->execute();
    }

    // READ
    public function listar() {
        $result = $this->conn->query("SELECT * FROM Pessoa");
        return $result;
    }

    // UPDATE
   public function atualizar($id, $cpf, $nome, $telefone) {
    try {
        $sql = "UPDATE pessoa 
                SET cpf=?, nome=?, telefone=? 
                WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $cpf, $nome, $telefone, $id);
        return $stmt->execute();

    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            return "cpf_duplicado";
        }
        return false;
    }
}

    // DELETE
    public function deletar($id) {
        $sql = "DELETE FROM Pessoa WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}