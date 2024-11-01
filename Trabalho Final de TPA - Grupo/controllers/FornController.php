<?php

include_once 'models/Forn.php';

class FornController {
    private $db;
    private $forn;

    public function __construct($db) {
        $this->db = $db;
        $this->forn = new Forn($db);
    }

    // Método para criar um novo fornecedor
    public function create_forn($nome, $telefone, $email, $endereco) {
        $this->forn->nome = $nome;
        $this->forn->telefone = $telefone;
        $this->forn->email = $email;
        $this->forn->endereco = $endereco;

        if($this->forn->create_forn()) {
            return "Fornecedor criado.";
        } else {
            return "Não foi possível criar fornecedor.";
        }
    }

    // Método para obter detalhes de um fornecedor pelo ID_FORNECEDOR
    public function readOne_forn($id_fornecedor) {
        $this->forn->id_fornecedor = $id_fornecedor;
        $this->forn->readOne_forn();

        if($this->forn->nome != null) {
            // Cria um array associativo com os detalhes do fornecedor
            $forn_arr = array(
                "id_fornecedor" => $this->forn->id_fornecedor,
                "nome" => $this->forn->nome,
                "telefone" => $this->forn->telefone,
                "email" => $this->forn->email,
                "endereco" => $this->forn->endereco
            );
            return $forn_arr;
        } else {
            return "Fornecedor não localizado.";
        }
    }

    // Método para atualizar os dados de um fornecedor
    public function update_forn($id_fornecedor, $nome, $telefone,$email, $endereco) {
        $this->forn->id_fornecedor = $id_fornecedor;
        $this->forn->nome = $nome;
        $this->forn->telefone = $telefone;
        $this->forn->email = $email;
        $this->forn->endereco = $endereco;

        if($this->forn->update_forn()) {
            return "Fornecedor atualizado.";
        } else {
            return "Não foi possível atualizar o fornecedor.";
        }
    }

    // Método para excluir um fornecedor pelo ID_FORNECEDOR
    public function delete_forn($id_fornecedor) {
        $this->forn->id_fornecedor = $id_fornecedor;

        if($this->forn->delete_forn()) {
            return "Fornecedor foi excluído.";
        } else {
            return "Nao foi possível excluir fornecedor.";
        }
    }
    public function index_forn() {
        return $this->readAll_forn();
    }
    
    // Método para listar todos os fornecedors (exemplo adicional)
    public function readAll_forn() {
        $query = "SELECT id_fornecedor, nome, telefone, email, endereco FROM " . $this->forn->table_nome;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $forns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $forns;
    }
}
?>