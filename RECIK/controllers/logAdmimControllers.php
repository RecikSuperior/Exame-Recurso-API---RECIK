<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $path = '../model/usuario.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        die("Erro: O arquivo usuario.php não foi encontrado.");
    }

    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);


    try {
        $usuario = new Usuario();
    } catch (Exception $e) {
        die("Erro ao criar o objeto Usuario: " . $e->getMessage());
    }

    try {
        $user = $usuario->getUserByEmail($email);
        var_dump($user); 
    } catch (Exception $e) {
        die("Erro ao obter usuário: " . $e->getMessage());
    }

    if ($user) {
        if (isset($user['senha'])) {
          
            if (password_verify($senha, $user['senha'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nome'] = $user['nome'];
                $_SESSION['user_email'] = $user['email'];

                header("Location: ../views/admin.php");
                exit();
            } else {
                echo "Credenciais inválidas. Por favor, tente novamente.";
            }
        } else {
            echo "Erro: A chave 'senha' não foi encontrada no array \$user.";
        }
    } else {
        echo "Credenciais inválidas. Por favor, tente novamente.";
    }
}
?>
