<?php

include_once 'config/database.php';
include_once 'controllers/UserController.php';
include_once 'controllers/TaskController.php';

$database = new Database();
$db = $database->getConnection();

$userController = new UserController($db);
$taskController = new TaskController($db);

// Obter a ação e o ID (se aplicável) dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Determinar a ação do usuário
switch ($action) {
    case 'create_user':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $userController->create($name, $email);
            echo $message;
            echo '<a href="index.php">Back to User List</a>';
        } else {
            include 'views/user/create.php';
        }
        break;

    case 'read_user':
        if ($id) {
            $user = $userController->readOne($id);
            if (is_array($user)) {
                include 'views/user/show.php';
            } else {
                echo $user; // Exibir mensagem de erro
            }
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'update_user':
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $userController->update($id, $name, $email);
                echo $message;
                echo '<a href="index.php">Back to User List</a>';
            } else {
                $user = $userController->readOne($id);
                include 'views/user/update.php';
            }
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'delete_user':
        if ($id) {
            $message = $userController->delete($id);
            echo $message;
            echo '<a href="index.php">Back to User List</a>';
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'create_task':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task_name = $_POST['task_name'];
            $prazo = $_POST['prazo'];
            $message = $taskController->create($task_name, $prazo);
            echo $message;
            echo '<a href="index.php">Back to Task List</a>';
        } else {
            include 'views/task/create.php';
        }
        break;

    case 'read_task':
        if ($id) {
            $task = $taskController->readOne($id);
            if (is_array($task)) {
                include 'views/task/show.php';
            } else {
                echo $task; // Exibir mensagem de erro
            }
        } else {
            echo 'Task ID is required.';
        }
        break;

    case 'update_task':
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $task_name = $_POST['task_name'];
                $prazo = $_POST['prazo'];
                $message = $taskController->update($id, $task_name, $prazo);
                echo $message;
                echo '<a href="index.php">Back to Task List</a>';
            } else {
                $task = $taskController->readOne($id);
                include 'views/task/update.php';
            }
        } else {
            echo 'Task ID is required.';
        }
        break;

    case 'delete_task':
        if ($id) {
            $message = $taskController->delete($id);
            echo $message;
            echo '<a href="index.php">Back to Task List</a>';
        } else {
            echo 'Task ID is required.';
        }
        break;

    case 'users':
        $users = $userController->index();
        include 'views/user/index.php';
        break;

    case 'tasks':
        $tasks = $taskController->readAll();
        include 'views/task/index.php';
        break;

    default:
        include 'views/home.php';
        break;
}
?>
