<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestão Imobiliário</title>
    <link rel="stylesheet" href="css/logadmin.css">
</head>
<body>
    <div class="login-container">
        <div class="login-panel">
            <h2>Gestão Imobiliário</h2>
            <p>Bem-vindo Admin. Por favor, faça o login para continuar.</p>
        </div>
        <div class="login-form">
            <h2>Login Administrador</h2>
            <form action="../controllers/logAdmimControllers.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
                
                <button type="submit">Entrar</button><br>
            </form>
        </div>
    </div>
</body>
</html>
