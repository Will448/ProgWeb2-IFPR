CREATE DATABASE progweb2;

CREATE TABLE Pessoa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20)
);

CREATE TABLE Livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    status VARCHAR(50) NOT NULL
);

CREATE TABLE Emprestimo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pessoa_id INT,
    livro_id INT,
    data_emprestimo DATE,
    data_devolucao DATE,
    
    FOREIGN KEY (pessoa_id) REFERENCES Pessoa(id),
    FOREIGN KEY (livro_id) REFERENCES Livros(id)
);

INSERT INTO Pessoa (cpf, nome, telefone) VALUES
('123.456.789-00', 'João Silva', '49999999999'),
('987.654.321-00', 'Maria Souza', '48988888888');

INSERT INTO Livros (nome, autor, status) VALUES
('Dom Casmurro', 'Machado de Assis', 'disponivel'),
('O Hobbit', 'J.R.R. Tolkien', 'emprestado');

SELECT * FROM Pessoa;
SELECT * FROM livros;
SELECT * FROM emprestimo;