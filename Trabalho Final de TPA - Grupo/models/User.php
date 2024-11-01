<?php

class User {
    private $conn;
    public $table_nome = "users";

    public $idUser;
    public $nome;
    public $email;
    public $senha;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create_user() {
        $query = "INSERT INTO " . $this->table_nome . " (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        // Bind parameters
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne_user() {
        $query = "SELECT nome, email, senha FROM " . $this->table_nome . " WHERE idUser = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idUser);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
        $this->email = $row['email'];
        $this->senha = $row['senha'];
    }

    // Update - Atualizar os dados de um usuário
    public function update_user() {
        $query = "UPDATE " . $this->table_nome . " SET nome = :nome, email = :email, senha = :senha WHERE idUser = :idUser";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->idUser = htmlspecialchars(strip_tags($this->idUser));
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        // Bind parameters
        $stmt->bindParam(':idUser', $this->idUser);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir um usuário pelo ID
    public function delete_user() {
        $query = "DELETE FROM " . $this->table_nome . " WHERE idUser = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idUser);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>