<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: logAdmim.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrQmO2R4JGXS8tvV6UgLaGn5EImTL1j7txiJ+8CZGF2JFYv3T+dY8/0N5C7JHDbrF2FQdA+PZD/AevosSw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Admin Dashboard</h2>
        </div>
        <ul>
            <li><a href="#overview"><i class="fas fa-tachometer-alt"></i> Resumo</a></li>
            <li><a href="imovel.php"><i class="fas fa-building"></i> Imóveis</a></li>
            <li><a href="usuario.php"><i class="fas fa-users"></i> Usuários</a></li>
            <li><a href="cliente.php"><i class="fas fa-list"></i> Clientes</a></li>
            <li><a href="#messages"><i class="fas fa-envelope"></i> Mensagens</a></li>
            <li><a href="#settings"><i class="fas fa-cogs"></i> Configurações</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h1>Bem-vindo, Admin</h1>
        </header>
        <section id="overview">
            <h2>Resumo</h2>
            <div class="cards">
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-info">
                        <h3>150</h3>
                        <p>Imóveis</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-info">
                    <?php
                    // Incluir o arquivo do modelo para listar os usuários
                    require_once '../model/usuario.php';
                    $usuario = new Usuario();
                    $usuarios = $usuario->readAll();
                    
                    $numUsuarios = count($usuarios);
                    
                    echo "Número de usuários cadastrados: " . $numUsuarios;
                    ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="card-info">
                    <?php
                    // Incluir o arquivo do modelo para listar os usuários
                    require_once '../model/cliente.php';
                    $cliente = new Cliente();
                    $clientes = $cliente->readAll();
                    
                    $numUsuarios = count($clientes);
                    
                    echo "Número de usuários cadastrados: " . $numUsuarios;
                    ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="card-info">
                        <h3>25</h3>
                        <p>Mensagens</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="properties">
            <h2>Imóveis</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Localização</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Apartamento Luxuoso</td>
                        <td>Apartamento</td>
                        <td>Centro da Cidade</td>
                        <td>500,000</td>
                        <td><button>Editar</button> <button>Deletar</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section id="users">
    <h2>Usuários</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data de Registro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Incluir o arquivo do modelo para listar os usuários
            require_once '../model/usuario.php';
            $usuario = new Usuario();
            $usuarios = $usuario->readAll();

            foreach ($usuarios as $user) {
                echo "<tr>";
                echo "<td>{$user['id']}</td>";
                echo "<td>{$user['nome']}</td>";
                echo "<td>{$user['email']}</td>";
                echo "<td>{$user['created_at']}</td>";
                echo "<td><button>Editar</button> <button>Deletar</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</section>
            </table>
        </section>
        <section id="categories">
            <h2>Clientes</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
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
                echo "<td><button>Editar</button> <button>Deletar</button></td>";
                echo "</tr>";
            }
            ?>
                    
                </tbody>
            </table>
        </section>
        <section id="messages">
            <h2>Mensagens</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Mensagem</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            // Incluir o arquivo do modelo para listar os usuários
            require_once '../model/contacto.php';
            $contacto = new Contacto();
            $contactos = $contacto->readAll();

            foreach ($contactos as $user) {
                echo "<tr>";
                echo "<td>{$user['id']}</td>";
                echo "<td>{$user['nome']}</td>";
                echo "<td>{$user['email']}</td>";
                echo "<td>{$user['mensagem']}</td>";
                echo "<td><button>Editar</button> <button>Deletar</button></td>";
                echo "</tr>";
            }
            ?>
                  
                </tbody>
            </table>
        </section>
        <section id="settings">
            <h2>Configurações</h2>
        </section>
    </div>
    <script src="js/admin-scripts.js"></script>
</body>
</html>
