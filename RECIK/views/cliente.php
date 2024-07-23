<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários - Gestão Imobiliário</title>
    <link rel="stylesheet" href="css/user-registration.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                
            </ul>
        </nav>
    </header>
    <main>
        <section id="user-registration">
            <h2>Cadastro de Cliente</h2>
            <form onSubmit="onSubmit(event)">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="telefone">Telefone:</label>
    <input type="tel" name="telefone" id="telefone" required>
    <br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>
    <br>
    <input type="submit" value="Cadastrar">
</form>

        </section>

        <section id="user-list">
            <h2>Clientes Cadastrados</h2>
            <table id="userTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Incluir o arquivo do modelo para listar os usuários
                    require_once '../model/cliente.php';
                    $cliente = new Cliente();
                    $clientes = $cliente->readAll();

                    foreach ($clientes as $user) {
                        echo "<tr>";
                        echo "<td>{$user['id']}</td>";
                        echo "<td>{$user['nome']}</td>";
                        echo "<td>{$user['email']}</td>";
                        echo "<td>{$user['telefone']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Gestão Imobiliário. Todos os direitos reservados.</p>
    </footer>

    <script>
        async function onSubmit(event) {
            event.preventDefault();
            console.log("Submit method was called", event.target)

            const form = new FormData(event.target);
            const nome = form.get("nome");
            const telefone = form.get("telefone")
            const email = form.get("email");
            const senha = form.get("senha");

            const response = await fetch("/20210523FernandoMaria/api/clients/create", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ nome, email, telefone, senha }),
             });

            const result = await response.json();

            console.log("Response received:", result); // Log da resposta


        }
    </script>
</body>
</html>
