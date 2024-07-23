<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Vendas - Gestão Imobiliário</title>
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
        <section id="venda-registration">
            <h2>Cadastro de Venda</h2>
            <form onSubmit="onSubmit(event)">
                <label for="Agencia">Agência:</label>
                <input type="text" name="Agencia" id="Agencia" required>
                <br>
                <label for="DataVenda">Data da Venda:</label>
                <input type="date" name="DataVenda" id="DataVenda" required>
                <br>
                <label for="FuncionarioID">ID do Funcionário:</label>
                <input type="number" name="FuncionarioID" id="FuncionarioID" required>
                <br>
                <label for="ImovelID">ID do Imóvel:</label>
                <input type="number" name="ImovelID" id="ImovelID" required>
                <br>
                <label for="ProprietarioID">ID do Proprietário:</label>
                <input type="number" name="ProprietarioID" id="ProprietarioID" required>
                <br>
                <label for="ClienteID">ID do Cliente:</label>
                <input type="number" name="ClienteID" id="ClienteID" required>
                <br>
                <input type="submit" value="Cadastrar">
            </form>
        </section>

        <section id="venda-list">
            <h2>Vendas Cadastradas</h2>
            <table id="vendaTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Agência</th>
                        <th>Data da Venda</th>
                        <th>ID do Funcionário</th>
                        <th>ID do Imóvel</th>
                        <th>ID do Proprietário</th>
                        <th>ID do Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../model/Venda.php';
                    $venda = new Venda();
                    $vendas = $venda->readAll();

                    foreach ($vendas as $item) {
                        echo "<tr>";
                        echo "<td>{$item['VendaID']}</td>";
                        echo "<td>{$item['Agencia']}</td>";
                        echo "<td>{$item['DataVenda']}</td>";
                        echo "<td>{$item['FuncionarioID']}</td>";
                        echo "<td>{$item['ImovelID']}</td>";
                        echo "<td>{$item['ProprietarioID']}</td>";
                        echo "<td>{$item['ClienteID']}</td>";
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
            const Agencia = form.get("Agencia");
            const DataVenda = form.get("DataVenda");
            const FuncionarioID = form.get("FuncionarioID");
            const ImovelID = form.get("ImovelID");
            const ProprietarioID = form.get("ProprietarioID");
            const ClienteID = form.get("ClienteID");

            const response = await fetch("/20210523FernandoMaria/api/vendas/create", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ Agencia, DataVenda, FuncionarioID, ImovelID, ProprietarioID, ClienteID }),
            });

            const result = await response.json();

            console.log("Response received:", result);
        }
    </script>
</body>
</html>
