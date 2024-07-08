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
    public function create($name, $email, $senha) {
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->senha = $senha;

        if($this->user->create()) {
            return "Usuário criado.";
        } else {
            return "Não foi possível criar usuário.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne($id) {
        $this->user->id = $id;
        $this->user->readOne();

        if($this->user->name != null) {
            // Cria um array associativo com os detalhes do usuário
            $user_arr = array(
                "id" => $this->user->id,
                "name" => $this->user->name,
                "email" => $this->user->email,
                "senha" => $this->user->senha
            );
            //var_dump($user_arr);
            return $user_arr;
        } else {
            return "Usuário não localizado.";   
        }
    }

    // Método para atualizar os dados de um usuário
    public function update($id, $name, $email, $senha) {
        $this->user->id = $id;
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->senha = $senha;

        if($this->user->update()) {
            return "Usuário atualizado.";
        } else {
            return "Não foi possível atualizar o usuário.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete($id) {
        $this->user->id = $id;

        if($this->user->delete()) {
            return "Usuário foi excluído.";
        } else {
            return "Nao foi possível excluir usuário.";
        }
    }
    public function index() {
        return $this->readAll();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll() {
        $query = "SELECT id, name, email, senha FROM " . $this->user->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function login($email, $senha) {
        $this->user->email = $email;
        $this->user->senha = $senha;

        $query = "SELECT id, name, email FROM " . $this->user->table_name . " WHERE email = :email AND senha = :senha";
        $stmt = $this->db->prepare($query);
        //echo $query;
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // O login foi bem-sucedido, redireciona para a página de boas-vindas
            return true;
        } else {
            // O login falhou, exibe uma mensagem de erro
            return false;
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
?>
