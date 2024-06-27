<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criando nova Tarefa</title>
</head>
<body>
    <h1>Criando nova Tarefa</h1>
    <form action="index.php?action=create_task" method="post">
        <label for="task_name">Tarefa:</label>
        <input type="text" id="task_name" name="task_name" required>
        <br>
        <label for="prazo">Prazo:</label>
        <input type="text" id="prazo" name="prazo" required>
        <br>
        <input type="submit" value="Create">
    </form>
    <a href="index.php?action=tasks">Voltar para lista de tarefas</a>
</body>
</html>
