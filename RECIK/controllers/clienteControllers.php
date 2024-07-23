<?php
require_once '../model/Cliente.php';
session_start();


class ClientController {
    private $clientModel;

    public function __construct() {
        $this->clientModel = new Cliente();
    }

    public function create($data) {
        $this->clientModel->nome = $data['nome'];
        $this->clientModel->email = $data['email'];
        $this->clientModel->telefone = $data['telefone'];
        $this->clientModel->senha = $data['senha'];
    
      
        $result = $this->clientModel->create();

        if ($result === true) {
           return [
               "status" => "success",
               "statusCode" => "200",
               "MESSAGE" => "Cliente criado com sucesso",
               "result" => $result
           ];
        } elseif ($result === "Email já cadastrado.") {
            return [
                "status" => "error",
                "statusCode" => "400",
                "message" => "Email já cadastrado.",
                "result" => $result
               ];
        } else {
            return [
                "status" => "error",
                "statusCode" => "400",
                "message" => "Ocorreu um erro ao cadastrar o usuario.",
                "result" => $result
               ];
        }
    }

    public function list() {
        $clientes = $this->clientModel->readAll();
        
        return [
            "data" => $clientes,
            "status" => "success",
            "statusCode" => "200"
        ];
    }
}
?>
