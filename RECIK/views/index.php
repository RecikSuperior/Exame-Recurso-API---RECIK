<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Gestão Imobiliário</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrQmO2R4JGXS8tvV6UgLaGn5EImTL1j7txiJ+8CZGF2JFYv3T+dY8/0N5C7JHDbrF2FQdA+PZD/AevosSw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="sobre.html">Sobre Nós</a></li>
                <li class="dropdown">
                    <a href="categoria.html">Categorias</a>
                    <ul class="dropdown-content">
                        <li><a href="apartamentos.php">Apartamentos</a></li>
                        <li><a href="terrenos.php">Terrenos</a></li>
                        <li><a href="vivenda.php">Vivendas</a></li>
                    </ul>
                </li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="hero">
            <h1>Bem-vindo à Gestão Imobiliário</h1>
            <p>Encontre a propriedade dos seus sonhos.</p>
            <a href="categorias.html" class="btn">Ver Propriedades</a>
        </section>

        <section id="featured-properties">
            <h2>Propriedades em Destaque</h2>
            <div class="property-grid">
                <div class="property">
                    <img src="img/OIP (2).jpg" alt="Apartamento">
                    <h3>Apartamento Luxuoso</h3>
                    <p>Localizado no centro da cidade, com todas as comodidades.</p>
                </div>
                <div class="property">
                    <img src="img/OIP (3).jpg" alt="Terreno">
                    <h3>Terreno Amplo</h3>
                    <p>Perfeito para construir a casa dos seus sonhos.</p>
                </div>
                <div class="property">
                    <img src="img/R.jpg" alt="Vivenda">
                    <h3>Vivenda Moderna</h3>
                    <p>Espaçosa e com design contemporâneo.</p>
                </div>
            </div>
        </section>

        <section id="services">
            <h2>Nossos Serviços</h2>
            <div class="services-grid">
                <div class="service">
                    <i class="fas fa-home"></i>
                    <h3>Compra e Venda</h3>
                    <p>Ajuda completa na compra e venda de propriedades.</p>
                </div>
                <div class="service">
                    <i class="fas fa-search"></i>
                    <h3>Avaliações</h3>
                    <p>Avaliações precisas para garantir o valor justo.</p>
                </div>
                <div class="service">
                    <i class="fas fa-handshake"></i>
                    <h3>Consultoria</h3>
                    <p>Consultoria especializada para investimentos imobiliários.</p>
                </div>
            </div>
        </section>

        <section id="testimonials">
            <h2>O que nossos clientes dizem</h2>
            <div class="testimonial-grid">
                <div class="testimonial">
                    <p>"A experiência foi incrível, encontrei a casa perfeita!"</p>
                    <h4>- Maria Silva</h4>
                </div>
                <div class="testimonial">
                    <p>"Serviço profissional e atendimento excepcional."</p>
                    <h4>- João Pereira</h4>
                </div>
                <div class="testimonial">
                    <p>"Recomendo a todos que procuram um bom negócio imobiliário."</p>
                    <h4>- Ana Costa</h4>
                </div>
            </div>
        </section>

        <section id="contact">
            <h2>Entre em Contato</h2>
            <form>
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                
                <label for="message">Mensagem:</label>
                <textarea id="message" name="message"></textarea>
                
                <button type="submit">Enviar</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Gestão Imobiliário. Todos os direitos reservados.</p>
    </footer>
    <script src="js/scripts.js"></script>
</body>
</html>
