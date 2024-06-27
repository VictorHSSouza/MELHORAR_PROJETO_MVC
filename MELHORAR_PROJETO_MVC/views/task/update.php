<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizando Tarefa</title>
</head>
<body>
    <h1>Atualizando Tarefa</h1>
    <form action="index.php?action=update_task&id=<?php echo $task['id']; ?>" method="post">
        <label for="task_name">Name:</label>
        <input type="text" id="task_name" name="task_name" value="<?php echo htmlspecialchars($task['task_name'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="prazo">Email:</label>
        <input type="prazo" id="prazo" name="prazo" value="<?php echo htmlspecialchars($task['prazo'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php?action=tasks">Voltar para lista de tarefas</a>
</body>
</html>
