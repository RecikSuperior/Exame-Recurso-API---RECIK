<?php
require_once '../model/Contacto.php';

class ContactoController {
    private $contactoModel;

    public function __construct() {
        $this->contactoModel = new Contacto();
    }

    public function create($data) {
        $this->contactoModel->nome = $data['nome'];
        $this->contactoModel->email = $data['email'];
        $this->contactoModel->mensagem = $data['mensagem'];

        $result = $this->contactoModel->create();

        if ($result === true) {
            return [
                "status" => "success",
                "statusCode" => "200",
                "message" => "Mensagem enviada com sucesso",
            ];
        } else {
            return [
                "status" => "error",
                "statusCode" => "400",
                "message" => "Ocorreu um erro ao enviar a mensagem.",
            ];
        }
    }

    public function list() {
        $contactos = $this->contactoModel->readAll();

        return [
            "data" => $contactos,
            "status" => "success",
            "statusCode" => "200"
        ];
    }
}
?>
