<?php
require_once '../model/Proprietario.php';

class ProprietarioController {
    private $proprietarioModel;

    public function __construct() {
        $this->proprietarioModel = new Proprietario();
    }

    public function create($data) {
        $this->proprietarioModel->Nome = $data['Nome'];
        $this->proprietarioModel->Email = $data['Email'];
        $this->proprietarioModel->Telefone = $data['Telefone'];
        $this->proprietarioModel->Password = $data['Password'];
        $this->proprietarioModel->Aprovado = $data['Aprovado'];

        $result = $this->proprietarioModel->create();

        if ($result === true) {
            return [
                "status" => "success",
                "statusCode" => "200",
                "message" => "Proprietário cadastrado com sucesso",
            ];
        } else {
            return [
                "status" => "error",
                "statusCode" => "400",
                "message" => "Ocorreu um erro ao cadastrar o proprietário.",
            ];
        }
    }

    public function list() {
        $proprietarios = $this->proprietarioModel->readAll();

        return [
            "data" => $proprietarios,
            "status" => "success",
            "statusCode" => "200"
        ];
    }
}
?>
