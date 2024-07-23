<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionários - Gestão Imobiliário</title>
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
        <section id="funcionario-registration">
            <h2>Cadastro de Funcionário</h2>
            <form onSubmit="onSubmit(event)">
                <label for="Codigo">Código:</label>
                <input type="text" name="Codigo" id="Codigo" required>
                <br>
                <label for="Nome">Nome:</label>
                <input type="text" name="Nome" id="Nome" required>
                <br>
                <label for="Agencia">Agência:</label>
                <input type="text" name="Agencia" id="Agencia" required>
                <br>
                <label for="Salario">Salário:</label>
                <input type="number" name="Salario" id="Salario" required>
                <br>
                <input type="submit" value="Cadastrar">
            </form>
        </section>

        <section id="funcionario-list">
            <h2>Funcionários Cadastrados</h2>
            <table id="funcionarioTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Agência</th>
                        <th>Salário</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../model/Funcionario.php';
                    $funcionario = new Funcionario();
                    $funcionarios = $funcionario->readAll();

                    foreach ($funcionarios as $item) {
                        echo "<tr>";
                        echo "<td>{$item['FuncionarioID']}</td>";
                        echo "<td>{$item['Codigo']}</td>";
                        echo "<td>{$item['Nome']}</td>";
                        echo "<td>{$item['Agencia']}</td>";
                        echo "<td>{$item['Salario']}</td>";
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
            const Codigo = form.get("Codigo");
            const Nome = form.get("Nome");
            const Agencia = form.get("Agencia");
            const Salario = form.get("Salario");

            const response = await fetch("/20210523FernandoMaria/api/funcionarios/create", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ Codigo, Nome, Agencia, Salario }),
            });

            const result = await response.json();

            console.log("Response received:", result);
        }
    </script>
</body>
</html>
