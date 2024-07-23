<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestão Imobiliário</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-panel">
            <h2>Gestão Imobiliário</h2>
            <p>Bem-vindo. Por favor, faça o login para continuar.</p>
        </div>
        <div class="login-form">
            <h2>Login</h2>
            <form action="../controllers/loginClienteControllers.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
                
                <button type="submit">Entrar</button><br>
                
                <a href="cliente.php" class="btn">Cadastrar-se</a><br><br>
                <a href="logAdmim.php" class="btn">Logar como Admin</a><br>
            </form>
        </div>
    </div>
</body>
</html>
