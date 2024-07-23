<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Proprietários - Gestão Imobiliário</title>
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
                <li><a href="index.html">Home</a></li>
                <li><a href="sobre.html">Sobre Nós</a></li>
                <li><a href="categorias.html">Categorias</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="proprietario-registration">
            <h2>Cadastro de Proprietário</h2>
            <form onSubmit="onSubmit(event)">
                <label for="Nome">Nome:</label>
                <input type="text" name="Nome" id="Nome" required>
                <br>
                <label for="Email">Email:</label>
                <input type="email" name="Email" id="Email" required>
                <br>
                <label for="Telefone">Telefone:</label>
                <input type="tel" name="Telefone" id="Telefone" required>
                <br>
                <label for="Password">Password:</label>
                <input type="password" name="Password" id="Password" required>
                <br>
                <label for="Aprovado">Aprovado:</label>
                <input type="checkbox" name="Aprovado" id="Aprovado">
                <br>
                <input type="submit" value="Cadastrar">
            </form>
        </section>

        <section id="proprietario-list">
            <h2>Proprietários Cadastrados</h2>
            <table id="proprietarioTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Aprovado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../model/Proprietario.php';
                    $proprietario = new Proprietario();
                    $proprietarios = $proprietario->readAll();

                    foreach ($proprietarios as $item) {
                        echo "<tr>";
                        echo "<td>{$item['ProprietarioID']}</td>";
                        echo "<td>{$item['Nome']}</td>";
                        echo "<td>{$item['Email']}</td>";
                        echo "<td>{$item['Telefone']}</td>";
                        echo "<td>" . ($item['Aprovado'] ? 'Sim' : 'Não') . "</td>";
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

            const form = new FormData(event.target);
            const Nome = form.get("Nome");
            const Email = form.get("Email");
            const Telefone = form.get("Telefone");
            const Password = form.get("Password");
            const Aprovado = form.get("Aprovado") ? 1 : 0;

            const response = await fetch("/20210523FernandoMaria/api/proprietarios/create", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ Nome, Email, Telefone, Password, Aprovado }),
            });

            const result = await response.json();

            console.log("Response received:", result);
        }
    </script>
</body>
</html>
