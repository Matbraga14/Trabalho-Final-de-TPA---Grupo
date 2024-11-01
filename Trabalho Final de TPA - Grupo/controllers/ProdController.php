<?php

include_once 'models/prod.php';

class ProdController {
    private $db;
    private $prod;

    public function __construct($db) {
        $this->db = $db;
        $this->prod = new Prod($db);
    }

    // Método para criar um novo usuário
    public function create_prod($nome, $descricao, $preco, $qtd_estoque, $categoria, $fk_id_fornecedor) {
        $this->prod->nome = $nome;
        $this->prod->descricao = $descricao;
        $this->prod->preco = $preco;
        $this->prod->qtd_estoque = $qtd_estoque;
        $this->prod->categoria = $categoria;
        $this->prod->fk_id_fornecedor = $fk_id_fornecedor;


        if($this->prod->create_prod()) {
            return "Produto criado.";
        } else {
            return "Não foi possível criar produto.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne_prod($id_produto) {
        $this->prod->id_produto = $id_produto;
        $this->prod->readOne_prod();

        if($this->prod->nome != null) {
            // Cria um array associativo com os detalhes do usuário
            $prod_arr = array(
                "id_produto" => $this->prod->id_produto,
                "nome" => $this->prod->nome,
                "descricao" => $this->prod->descricao,
                "preco" => $this->prod->preco,
                "qtd_estoque" => $this->prod->qtd_estoque,
                "categoria" => $this->prod->categoria,
                "fk_id_fornecedor" => $this->prod->fk_id_fornecedor,
                

            );
            return $prod_arr;
        } else {
            return "Produto não localizado.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update_prod($id_produto, $nome, $descricao, $preco, $qtd_estoque, $categoria, $fk_id_fornecedor) {
        $this->prod->id_produto = $id_produto;
        $this->prod->nome = $nome;
        $this->prod->descricao = $descricao;
        $this->prod->preco = $preco;
        $this->prod->qtd_estoque = $qtd_estoque;
        $this->prod->categoria = $categoria;
        $this->prod->fk_id_fornecedor = $fk_id_fornecedor;

        if($this->prod->update_prod()) {
            return "Produto atualizado.";
        } else {
            return "Não foi possível atualizar o produto.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete_prod($id_produto) {
        $this->prod->id_produto = $id_produto;

        if($this->prod->delete_prod()) {
            return "Produto foi excluído.";
        } else {
            return "Nao foi possível excluir produto.";
        }
    }
    public function index_prod() {
        return $this->readAll_prod();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll_prod() {
        $query = "SELECT * FROM " . $this->prod->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $prods = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $prods;
    }
}
?>