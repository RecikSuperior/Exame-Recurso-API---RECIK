<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $path = '../model/cliente.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        die("Erro: O arquivo cliente.php não foi encontrado.");
    }

    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    try {
        $cliente = new Cliente();
    } catch (Exception $e) {
        die("Erro ao criar o objeto Cliente: " . $e->getMessage());
    }

    try {
        $user = $cliente->getUserByEmail($email);
    } catch (Exception $e) {
        die("Erro ao obter usuário: " . $e->getMessage());
    }

    if ($user && isset($user['senha'])) {
        if ($senha === $user['senha']) { 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nome'] = $user['nome'];
            $_SESSION['user_email'] = $user['email'];
            header("Location: ../views/index.php");
            exit();
        } else {
            echo "Credenciais inválidas. Por favor, tente novamente.";
        }
    } else {
        echo "Credenciais inválidas. Por favor, tente novamente.";
    }
}
?>
