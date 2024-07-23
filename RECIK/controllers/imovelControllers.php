<?php
require_once '../model/Imovel.php';

class ImovelController {
    private $imovelModel;

    public function __construct() {
        $this->imovelModel = new Imovel();
    }

    public function create($data) {
        $this->imovelModel->TipoImovel = $data['TipoImovel'];
        $this->imovelModel->AnoConstrucao = $data['AnoConstrucao'];
        $this->imovelModel->Area = $data['Area'];
        $this->imovelModel->Localizacao = $data['Localizacao'];
        $this->imovelModel->Tipologia = $data['Tipologia'];
        $this->imovelModel->Preco = $data['Preco'];
        $this->imovelModel->ProprietarioID = $data['ProprietarioID'];

        $result = $this->imovelModel->create();

        if ($result === true) {
            return [
                "status" => "success",
                "statusCode" => "200",
                "message" => "Imóvel cadastrado com sucesso",
            ];
        } else {
            return [
                "status" => "error",
                "statusCode" => "400",
                "message" => "Ocorreu um erro ao cadastrar o imóvel.",
            ];
        }
    }

    public function list() {
        $imoveis = $this->imovelModel->readAll();

        return [
            "data" => $imoveis,
            "status" => "success",
            "statusCode" => "200"
        ];
    }
}
?>
