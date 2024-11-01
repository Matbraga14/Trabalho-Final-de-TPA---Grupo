<?php

include_once 'config/database.php';
include_once 'config/conexao.php';
include_once 'controllers/UserController.php';
include_once 'controllers/ProdController.php';
include_once 'controllers/FornController.php';

$database = new Database();
$db = $database->getConnection();

$userController = new UserController($db);
$prodController = new ProdController($db);
$fornController = new FornController($db);

// Obter a ação e o ID (se aplicável) dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id_produto = isset($_GET['id_produto']) ? $_GET['id_produto'] : null;
$id_fornecedor = isset($_GET['id_fornecedor']) ? $_GET['id_fornecedor'] : null;



// Determinar a ação do usuário
switch ($action) {

    case 'adm':
            include 'login/protect.php';
            $prods = $prodController->index_prod();
            include 'views/prod/index.php';
            $forns = $fornController->index_forn();
            include 'views/forn/index.php';
            echo '<br> <a href="views/home.php">Voltar para a tela inicial</a>';
        break;

    case 'user':
            $prods = $prodController->index_prod();
            include 'views/prod/index.php';
            $forns = $fornController->index_forn();
            include 'views/forn/index.php';
            echo '<br> <a href="views/home.php">Voltar para a tela inicial</a>';
        break;
    
    case 'create-user':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $mysqli->real_escape_string($_POST['email']);
            $sql_code = "select * from users where email = '$email'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
            $quantidade = $sql_query->num_rows;
            if ($quantidade == 0) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $message = $userController->create_user($name, $email, $senha);
                echo $message;
                echo '<br> <a href="views/home.php">Voltar para a tela inicial</a>';
            } else {
                echo "Usuário já cadastrado";
                echo '<br> <a href="views/home.php">Voltar para a tela inicial</a>';
            }
        } else {
            include 'create.php';
        }
        break;

        
    case 'read-user':
        if ($idUser) {
            $user = $userController->readOne_user($idUser);
            if (is_array($user)) {
                include 'views/user/show.php';
            } else {
                echo $user; // Exibir mensagem de erro
            }
        } else {
            echo 'User ID is required.';
            echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
        }
        break;

    case 'update-user': 
        if ($idUser) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $message = $userController->update_user($id, $name, $email, $senha);
                echo $message;
                echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
            } else {
                $user = $userController->readOne_user($idUser);
                include 'views/user/update.php';
            }
        } else {
            echo 'User ID is required.';
            echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
        }
        break;

    case 'delete-user':
        if ($idUser) {
            $message = $userController->delete_user($idUser);
            echo $message; 
            echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
        } else {
            echo 'User ID is required.';
            echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
        }
        break;

    case 'create-prod':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fk_id_fornecedor = $mysqli->real_escape_string($_POST['fk_id_fornecedor']);
            $sql_code = "select * from fornecedor where id_fornecedor = '$fk_id_fornecedor'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
            $quantidade = $sql_query->num_rows;
            if ($quantidade > 0) {
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $preco = $_POST['preco'];
                $qtd_estoque = $_POST['qtd_estoque'];
                $categoria = $_POST['categoria'];
                $fk_id_fornecedor = $_POST['fk_id_fornecedor'];
                $message = $prodController->create_prod($nome, $descricao, $preco, $qtd_estoque, $categoria, $fk_id_fornecedor);
                echo $message;
                echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
            } else {
                echo 'É preciso de um fornecedor cadastro.';
                echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
            }
           
        } else {
            include 'views/prod/create.php';
        }
        break;    

        case 'read-prod':
            if ($id_produto) {
                $prod = $prodController->readOne_prod($id_produto);
                if (is_array($prod)) {
                    include 'views/prod/show.php';
                } else {
                    echo $user; // Exibir mensagem de erro
                }
            } else {
                echo 'User ID is required.';
                echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
            }
            break;

        case 'update-prod': 
            if ($id_produto) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nome = $_POST['nome'];
                    $descricao = $_POST['descricao'];
                    $preco = $_POST['preco'];
                    $qtd_estoque = $_POST['qtd_estoque'];
                    $categoria = $_POST['categoria'];
                    $fk_id_fornecedor = $_POST['fk_id_fornecedor'];
                    $message = $prodController->update_prod($id_produto, $nome, $descricao, $preco, $qtd_estoque, $categoria, $fk_id_fornecedor);
                    echo $message;
                    echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
                } else {
                    $prod = $prodController->readOne_prod($id_produto);
                    include 'views/prod/update.php';
                }
            } else {
                echo 'User ID is required.';
                echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
            }
            break;

            case 'delete-prod':
                if ($id_produto) {
                    $message = $prodController->delete_prod($id_produto);
                    echo $message; 
                    echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
                } else {
                    echo 'Produto ID is required.';
                    echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
                }
                break;


                case 'create-forn':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $nome = $_POST['nome'];
                        $telefone = $_POST['telefone'];
                        $email = $_POST['email'];
                        $endereco = $_POST['endereco'];
                        $message = $fornController->create_forn($nome, $telefone, $email, $endereco);
                        echo $message;
                        echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
                    } else {
                        include 'views/forn/create.php';
                    }
                    break;
            
                    
                case 'read-forn':
                    if ($id_fornecedor) {
                        $forn = $fornController->readOne_forn($id_fornecedor);
                        if (is_array($forn)) {
                            include 'views/forn/show.php';
                        } else {
                            echo $forn; // Exibir mensagem de erro
                        }
                    } else {
                        echo 'Fornecedor ID is required.';
                        echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
                    }
                    break;
            
                case 'update-forn': 
                    if ($id_fornecedor) {
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $nome = $_POST['nome'];
                            $telefone = $_POST['telefone'];
                            $email = $_POST['email'];
                            $endereco = $_POST['endereco'];   
                            $message = $fornController->update_forn($id_fornecedor, $nome, $telefone, $email, $endereco);
                            echo $message;
                            echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
                        } else {
                            $forn = $fornController->readOne_forn($id_fornecedor);
                            include 'views/forn/update.php';
                        }
                    } else {
                        echo 'Fornecedor ID is required.';
                        echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
                    }
                    break;
            
                case 'delete-forn':
                    if ($id_fornecedor) {
                        $sql_code = "select * from produtos where fk_id_fornecedor = $id_fornecedor";
                        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);             
                        $quantidade = $sql_query->num_rows;
                        if($quantidade == 0) {
                            $message = $fornController->delete_forn($id_fornecedor);
                            echo $message; 
                            echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
                        } else {
                            echo "Não é possível excluir um fornecedor que possui um produto vinculado a ele.";
                            echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
                        }
                    } else {
                        echo 'Fornecedor ID is required.';
                        echo '<br> <a href="index.php?action=adm">Voltar para a lista de produtos</a>';
                    }
                    break;
            
        

    default:
        header('Location: views/home.php');
        break;  
    }
?>