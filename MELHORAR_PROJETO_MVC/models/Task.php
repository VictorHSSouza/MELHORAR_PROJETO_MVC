<?php

class Task {
    private $conn;
    public $table_name = "tasks";

    public $id;
    public $task_name;
    public $prazo;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (task_name, prazo) VALUES (:task_name, :prazo)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->task_name = htmlspecialchars(strip_tags($this->task_name));
        $this->prazo = htmlspecialchars(strip_tags($this->prazo));

        // Bind parameters
        $stmt->bindParam(':task_name', $this->task_name);
        $stmt->bindParam(':prazo', $this->prazo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne() {
        $query = "SELECT task_name, prazo FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->task_name = $row['task_name'];
        $this->prazo = $row['prazo'];
    }

    // Update - Atualizar os dados de um usuário
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET task_name = :task_name, prazo = :prazo WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->task_name = htmlspecialchars(strip_tags($this->task_name));
        $this->prazo = htmlspecialchars(strip_tags($this->prazo));

        // Bind parameters
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':task_name', $this->task_name);
        $stmt->bindParam(':prazo', $this->prazo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir um usuário pelo ID
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>