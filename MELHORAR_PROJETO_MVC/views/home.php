<!DOCTYPE html>
<html lang="en">
<head>

    <?php
    if(!isset($_SESSION['user_id'])) {
        echo "Sem permissão para acesso a página<br>";
        echo '<a href="index.php?action=login">Ir para página inicial</a>';
        exit;
    } 
    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROJETO MVC 5 PONTOS</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <h1 class="display-2 m-5">Bem vindo ao sistema</h1>
    <nav class="m-5">
        <ul class="p-0 h3">
            <p><a href="index.php?action=users" type="button" class="btn btn-primary">Gerenciar Usuários</a></p>
            <p><a href="index.php?action=tasks"type="button" class="btn btn-primary">Gerenciar Tarefas</a></p>
        </ul>
    </nav>

    <div class="m-5">
        <ul class="p-0 h6">
            <p><a href="index.php?action=logout">Deslogar</a></p>
        </ul>
    </div>

</body>
</html>