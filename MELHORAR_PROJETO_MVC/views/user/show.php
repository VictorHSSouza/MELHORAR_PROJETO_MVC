<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes de usuário</title>
</head>
<body>
    <h1>Detalhes de usuário</h1>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Senha:</strong> <?php for($i = 0; $i < strlen(htmlspecialchars($user['senha'], ENT_QUOTES, 'UTF-8')); $i++){ echo '•';}; ?></p>
    <a href="index.php?action=users">Voltar para lista de usuários</a>
</body>
</html>
