<?php
require_once '../database/conexaoBd.php';

class LivroModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    // 📚 Listar todos os livros
    public function listar() {
        return $this->conn->query("SELECT * FROM Livros");
    }

    // 📚 Listar apenas disponíveis (opcional 🔥)
    public function listarDisponiveis() {
        return $this->conn->query(
            "SELECT * FROM Livros WHERE status = 'disponivel'"
        );
    }

    // ➕ Inserir livro
    public function inserir($nome, $autor, $status) {
        $sql = "INSERT INTO Livros (nome, autor, status) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $autor, $status);
        return $stmt->execute();
    }

    // ✏️ Atualizar livro
    public function atualizar($id, $nome, $autor, $status) {
        $sql = "UPDATE Livros SET nome=?, autor=?, status=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $nome, $autor, $status, $id);
        return $stmt->execute();
    }

    // ❌ Deletar livro
    public function deletar($id) {
        $sql = "DELETE FROM Livros WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}