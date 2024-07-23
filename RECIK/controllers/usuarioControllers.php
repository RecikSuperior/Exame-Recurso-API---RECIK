<?php
require_once '../model/Usuario.php';
session_start();

class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function create($data) {
        $this->usuarioModel->nome = $data['nome'];
        $this->usuarioModel->email = $data['email'];
        $this->usuarioModel->senha = password_hash($data['senha'], PASSWORD_BCRYPT);

        $result = $this->usuarioModel->create();

        if ($result === true) {
            return [
                "status" => "success",
                "statusCode" => "200",
                "message" => "Usuário criado com sucesso",
            ];
        } elseif ($result === "Email já cadastrado.") {
            return [
                "status" => "error",
                "statusCode" => "400",
                "message" => "Email já cadastrado.",
            ];
        } else {
            return [
                "status" => "error",
                "statusCode" => "400",
                "message" => "Ocorreu um erro ao cadastrar o usuário.",
            ];
        }
    }

    public function list() {
        $usuarios = $this->usuarioModel->readAll();

        return [
            "data" => $usuarios,
            "status" => "success",
            "statusCode" => "200"
        ];
    }
}
?>
