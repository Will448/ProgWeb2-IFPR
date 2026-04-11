<?php
require_once '../database/conexaoBd.php';

class EmprestimoModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    // 📌 Criar empréstimo
    public function emprestar($pessoa_id, $livro_id) {

        // Verifica se o livro já está emprestado
        $check = $this->conn->prepare(
            "SELECT * FROM Emprestimo 
             WHERE livro_id = ? AND data_devolucao IS NULL"
        );
        $check->bind_param("i", $livro_id);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            return "Livro já está emprestado!";
        }

        // Insere empréstimo
        $sql = "INSERT INTO Emprestimo (pessoa_id, livro_id, data_emprestimo) 
                VALUES (?, ?, NOW())";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $pessoa_id, $livro_id);

        if ($stmt->execute()) {

            // Atualiza status do livro
            $update = $this->conn->prepare(
                "UPDATE Livros SET status='emprestado' WHERE id=?"
            );
            $update->bind_param("i", $livro_id);
            $update->execute();

            return true;
        }

        return false;
    }

    // 📌 Listar empréstimos
    public function listar() {
        $sql = "SELECT e.id, p.nome AS pessoa, l.nome AS livro, 
                       e.data_emprestimo, e.data_devolucao
                FROM Emprestimo e
                JOIN Pessoa p ON e.pessoa_id = p.id
                JOIN Livros l ON e.livro_id = l.id";

        return $this->conn->query($sql);
    }

    // 📌 Devolver livro
    public function devolver($id) {

        // Atualiza data de devolução
        $sql = "UPDATE Emprestimo 
                SET data_devolucao = NOW()
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {

            // Pega o livro relacionado
            $res = $this->conn->query(
                "SELECT livro_id FROM Emprestimo WHERE id = $id"
            );
            $row = $res->fetch_assoc();

            // Atualiza status do livro
            $update = $this->conn->prepare(
                "UPDATE Livros SET status='disponivel' WHERE id=?"
            );
            $update->bind_param("i", $row['livro_id']);
            $update->execute();

            return true;
        }

        return false;
    }

    // 📌 Deletar (opcional)
    public function deletar($id) {
        $sql = "DELETE FROM Emprestimo WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}