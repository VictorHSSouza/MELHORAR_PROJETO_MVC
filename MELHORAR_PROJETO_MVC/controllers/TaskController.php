<?php

include_once 'models/Task.php';

class TaskController {
    private $db;
    private $task;

    public function __construct($db) {
        $this->db = $db;
        $this->task = new Task($db);
    }

    // Método para criar um novo tarefa
    public function create($task_name, $prazo) {
        $this->task->task_name = $task_name;
        $this->task->prazo = $prazo;

        if($this->task->create()) {
            return "Tarefa criado.";
        } else {
            return "Não foi possível criar tarefa.";
        }
    }

    // Método para obter detalhes de um tarefa pelo ID
    public function readOne($id) {
        $this->task->id = $id;
        $this->task->readOne();

        if($this->task->task_name != null) {
            // Cria um array associativo com os detalhes do tarefa
            $task_arr = array(
                "id" => $this->task->id,
                "task_name" => $this->task->task_name,
                "prazo" => $this->task->prazo
            );
            return $task_arr;
        } else {
            return "Tarefa não localizada.";
        }
    }

    // Método para atualizar os dados de um tarefa
    public function update($id, $task_name, $prazo) {
        $this->task->id = $id;
        $this->task->task_name = $task_name;
        $this->task->prazo = $prazo;

        if($this->task->update()) {
            return "Tarefa atualizada.";
        } else {
            return "Não foi possível atualizar o tarefa.";
        }
    }

    // Método para excluir um tarefa pelo ID
    public function delete($id) {
        $this->task->id = $id;

        if($this->task->delete()) {
            return "Tarefa foi excluído.";
        } else {
            return "Nao foi possível excluir tarefa.";
        }
    }
    public function index() {
        return $this->readAll();
    }
    
    // Método para listar todos os tarefas (exemplo adicional)
    public function readAll() {
        $query = "SELECT id, task_name, prazo FROM " . $this->task->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    }
}
?>
