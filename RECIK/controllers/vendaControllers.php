<?php
require_once '../model/Venda.php';

class VendaController {
    private $vendaModel;

    public function __construct() {
        $this->vendaModel = new Venda();
    }

    public function create($data) {
        $this->vendaModel->Agencia = $data['Agencia'];
        $this->vendaModel->DataVenda = $data['DataVenda'];
        $this->vendaModel->FuncionarioID = $data['FuncionarioID'];
        $this->vendaModel->ImovelID = $data['ImovelID'];
        $this->vendaModel->ProprietarioID = $data['ProprietarioID'];
        $this->vendaModel->ClienteID = $data['ClienteID'];

        $result = $this->vendaModel->create();

        if ($result === true) {
            return [
                "status" => "success",
                "statusCode" => "200",
                "message" => "Venda cadastrada com sucesso",
            ];
        } else {
            return [
                "status" => "error",
                "statusCode" => "400",
                "message" => "Ocorreu um erro ao cadastrar a venda.",
            ];
        }
    }

    public function list() {
        $vendas = $this->vendaModel->readAll();

        return [
            "data" => $vendas,
            "status" => "success",
            "statusCode" => "200"
        ];
    }
}
?>
