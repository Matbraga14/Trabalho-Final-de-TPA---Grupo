<?php

class Forn {
    private $conn;
    public $table_nome = "fornecedor";

    public $id_fornecedor;
    public $nome;
    public $telefone;
    public $email;
    public $endereco;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create_forn() {
        $query = "INSERT INTO " . $this->table_nome . " (nome, telefone ,email, endereco) VALUES (:nome, :telefone, :email, :endereco)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->endereco = htmlspecialchars(strip_tags($this->endereco));

        // Bind parameters
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':endereco', $this->endereco);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID_FORNECEDOR
    public function readOne_forn() {
        $query = "SELECT nome, telefone, email, endereco FROM " . $this->table_nome . " WHERE id_fornecedor = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_fornecedor);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
        $this->telefone = $row['telefone'];
        $this->email = $row['email'];
        $this->endereco = $row['endereco'];
    }

    // Update - Atualizar os dados de um usuário
    public function update_forn() {
        $query = "UPDATE " . $this->table_nome . " SET nome = :nome, telefone = :telefone, email = :email, endereco = :endereco WHERE id_fornecedor = :id_fornecedor";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->id_fornecedor = htmlspecialchars(strip_tags($this->id_fornecedor));
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->endereco = htmlspecialchars(strip_tags($this->endereco));

        // Bind parameters
        $stmt->bindParam(':id_fornecedor', $this->id_fornecedor);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':endereco', $this->endereco);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir um usuário pelo ID_FORNECEDOR
    public function delete_forn() {
        $query = "DELETE FROM " . $this->table_nome . " WHERE id_fornecedor = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_fornecedor);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>