<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Imóveis - Gestão Imobiliário</title>
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
        <section id="imovel-registration">
            <h2>Cadastro de Imóvel</h2>
            <form onSubmit="onSubmit(event)">
                <label for="TipoImovel">Tipo de Imóvel:</label>
                <input type="text" name="TipoImovel" id="TipoImovel" required>
                <br>
                <label for="AnoConstrucao">Ano de Construção:</label>
                <input type="number" name="AnoConstrucao" id="AnoConstrucao" required>
                <br>
                <label for="Area">Área:</label>
                <input type="text" name="Area" id="Area" required>
                <br>
                <label for="Localizacao">Localização:</label>
                <input type="text" name="Localizacao" id="Localizacao" required>
                <br>
                <label for="Tipologia">Tipologia:</label>
                <input type="text" name="Tipologia" id="Tipologia" required>
                <br>
                <label for="Preco">Preço:</label>
                <input type="number" name="Preco" id="Preco" required>
                <br>
                <label for="ProprietarioID">ID do Proprietário:</label>
                <input type="number" name="ProprietarioID" id="ProprietarioID" required>
                <br>
                <input type="submit" value="Cadastrar">
            </form>
        </section>

        <section id="imovel-list">
            <h2>Imóveis Cadastrados</h2>
            <table id="imovelTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Ano</th>
                        <th>Área</th>
                        <th>Localização</th>
                        <th>Tipologia</th>
                        <th>Preço</th>
                        <th>ID do Proprietário</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../model/Imovel.php';
                    $imovel = new Imovel();
                    $imoveis = $imovel->readAll();

                    foreach ($imoveis as $item) {
                        echo "<tr>";
                        echo "<td>{$item['ImovelID']}</td>";
                        echo "<td>{$item['TipoImovel']}</td>";
                        echo "<td>{$item['AnoConstrucao']}</td>";
                        echo "<td>{$item['Area']}</td>";
                        echo "<td>{$item['Localizacao']}</td>";
                        echo "<td>{$item['Tipologia']}</td>";
                        echo "<td>{$item['Preco']}</td>";
                        echo "<td>{$item['ProprietarioID']}</td>";
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
            const TipoImovel = form.get("TipoImovel");
            const AnoConstrucao = form.get("AnoConstrucao");
            const Area = form.get("Area");
            const Localizacao = form.get("Localizacao");
            const Tipologia = form.get("Tipologia");
            const Preco = form.get("Preco");
            const ProprietarioID = form.get("ProprietarioID");

            const response = await fetch("/20210523FernandoMaria/api/imoveis/create", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ TipoImovel, AnoConstrucao, Area, Localizacao, Tipologia, Preco, ProprietarioID }),
            });

            const result = await response.json();

            console.log("Response received:", result);
        }
    </script>
</body>
</html>
