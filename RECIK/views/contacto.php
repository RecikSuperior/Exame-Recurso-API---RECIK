<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Gestão Imobiliário</title>
    <link rel="stylesheet" href="css/styles.css">
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
        <section id="contact">
            <h2>Contacte-nos</h2>
            <form onSubmit="onSubmit(event)">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="mensagem">Mensagem</label>
                <textarea id="mensagem" name="mensagem" rows="5" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Gestão Imobiliário. Todos os direitos reservados.</p>
    </footer>

    <script>
        async function onSubmit(event) {
            event.preventDefault();

            const form = new FormData(event.target);
            const nome = form.get("nome");
            const email = form.get("email");
            const mensagem = form.get("mensagem");

            const response = await fetch("/20210523FernandoMaria/api/contactos/create", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ nome, email, mensagem }),
            });

            const result = await response.json();
            console.log("Response received:", result); // Log da resposta

            if (result.status === "success") {
                alert("Mensagem enviada com sucesso!");
                // Limpa o formulário
                event.target.reset();
            } else {
                alert(result.message);
            }
        }
    </script>
</body>
</html>
