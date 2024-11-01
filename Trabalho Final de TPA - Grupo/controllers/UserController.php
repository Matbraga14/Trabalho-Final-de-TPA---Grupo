<?php

include_once 'models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new User($db);
    }

    // Método para criar um novo usuário
    public function create_user($nome, $email, $senha) {
        $this->user->nome = $nome;
        $this->user->email = $email;
        $this->user->senha = $senha;

        if($this->user->create_user()) {
            return "Usuário criado.";
        } else {
            return "Não foi possível criar usuário.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne_user($idUser) {
        $this->user->idUser = $idUser;
        $this->user->readOne_user();

        if($this->user->nome != null) {
            // Cria um array associativo com os detalhes do usuário
            $user_arr = array(
                "idUser" => $this->user->idUser,
                "nome" => $this->user->nome,
                "email" => $this->user->email,
                "senha" => $this->user->senha 
            );
            return $user_arr;
        } else {
            return "Usuário não localizado.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update_user($idUser, $nome, $email, $senha) {
        $this->user->id = $idUser;
        $this->user->nome = $nome;
        $this->user->email = $email;
        $this->user->senha = $senha;

        if($this->user->update_user()) {
            return "Usuário atualizado.";
        } else {
            return "Não foi possível atualizar o usuário.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete_user($idUser) {
        $this->user->idUser = $idUser;

        if($this->user->delete_user()) {
            return "Usuário foi excluído.";
        } else {
            return "Nao foi possível excluir usuário.";
        }
    }
    public function index_user() {
        return $this->readAll_user();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll_user() {
        $query = "SELECT idUser, nome, email FROM " . $this->user->table_nome;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}
?>
