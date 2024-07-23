<?php
require_once '../model/Funcionario.php';

class FuncionarioController {
    private $funcionarioModel;

    public function __construct() {
        $this->funcionarioModel = new Funcionario();
    }

    public function create($data) {
        $this->funcionarioModel->Codigo = $data['Codigo'];
        $this->funcionarioModel->Nome = $data['Nome'];
        $this->funcionarioModel->Agencia = $data['Agencia'];
        $this->funcionarioModel->Salario = $data['Salario'];

        $result = $this->funcionarioModel->create();

        if ($result === true) {
            return [
                "status" => "success",
                "statusCode" => "200",
                "message" => "Funcionário cadastrado com sucesso",
            ];
        } else {
            return [
                "status" => "error",
                "statusCode" => "400",
                "message" => "Ocorreu um erro ao cadastrar o funcionário.",
            ];
        }
    }

    public function list() {
        $funcionarios = $this->funcionarioModel->readAll();

        return [
            "data" => $funcionarios,
            "status" => "success",
            "statusCode" => "200"
        ];
    }
}
?>
