<?php

class Prod {
    private $conn;
    public $table_name = "produtos";

    public $id_produto;
    public $nome;
    public $descricao;
    public $preco;
    public $qtd_estoque;
    public $fk_id_fornecedor;
    public $categoria;


    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function create_prod() {
        $query = "INSERT INTO " . $this->table_name . " (nome, descricao, preco, qtd_estoque, categoria, fk_id_fornecedor) VALUES (:nome, :descricao, :preco, :qtd_estoque, :categoria, :fk_id_fornecedor)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->qtd_estoque = htmlspecialchars(strip_tags($this->qtd_estoque));
        $this->categoria = htmlspecialchars(strip_tags($this->categoria));
        $this->fk_id_fornecedor = htmlspecialchars(strip_tags($this->fk_id_fornecedor));


        // Bind parameters
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':qtd_estoque', $this->qtd_estoque);
        $stmt->bindParam(':categoria', $this->categoria);
        $stmt->bindParam(':fk_id_fornecedor', $this->fk_id_fornecedor);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne_prod() {
        $query = "SELECT id_produto, nome, descricao, preco, qtd_estoque, categoria, fk_id_fornecedor  FROM " . $this->table_name . " WHERE id_produto = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_produto);
        $stmt->execute();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id_produto = $row['id_produto'];
        $this->nome = $row['nome'];
        $this->descricao = $row['descricao'];
        $this->preco = $row['preco'];
        $this->qtd_estoque = $row['qtd_estoque'];
        $this->categoria = $row['categoria'];
        $this->fk_id_fornecedor = $row['fk_id_fornecedor'];

        
    }

    // Update - Atualizar os dados de um usuário
    public function update_prod() {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, descricao = :descricao, preco = :preco, qtd_estoque = :qtd_estoque, categoria = :categoria, fk_id_fornecedor = :fk_id_fornecedor WHERE id_produto = :id_produto";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->id_produto = htmlspecialchars(strip_tags($this->id_produto));
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->qtd_estoque = htmlspecialchars(strip_tags($this->qtd_estoque));
        $this->categoria = htmlspecialchars(strip_tags($this->categoria));
        $this->fk_id_fornecedor = htmlspecialchars(strip_tags($this->fk_id_fornecedor));


        // Bind parameters
        $stmt->bindParam(':id_produto', $this->id_produto);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':qtd_estoque', $this->qtd_estoque);
        $stmt->bindParam(':categoria', $this->categoria);
        $stmt->bindParam(':fk_id_fornecedor', $this->fk_id_fornecedor);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir um usuário pelo ID
    public function delete_prod() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_produto = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_produto);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>