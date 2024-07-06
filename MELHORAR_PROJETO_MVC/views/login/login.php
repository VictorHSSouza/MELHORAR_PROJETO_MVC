<?php
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Adicione os links para os arquivos CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mt-5 mb-4">Login</h2>
                <form method="post" action="index.php?action=logar">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-4">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
