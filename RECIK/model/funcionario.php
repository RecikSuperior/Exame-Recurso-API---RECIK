<?php
require_once __DIR__ . '/../configuration/Connect.php';

class Funcionario {
    private $conn;
    private $table_name = "funcionarios";

    public $FuncionarioID;
    public $Codigo;
    public $Nome;
    public $Agencia;
    public $Salario;

    public function __construct() {
        $database = new Connect();
        $this->conn = $database->connection;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET 
                  Codigo=:Codigo, 
                  Nome=:Nome, 
                  Agencia=:Agencia, 
                  Salario=:Salario";

        $stmt = $this->conn->prepare($query);

        $this->Codigo = htmlspecialchars(strip_tags($this->Codigo));
        $this->Nome = htmlspecialchars(strip_tags($this->Nome));
        $this->Agencia = htmlspecialchars(strip_tags($this->Agencia));
        $this->Salario = htmlspecialchars(strip_tags($this->Salario));

        $stmt->bindParam(":Codigo", $this->Codigo);
        $stmt->bindParam(":Nome", $this->Nome);
        $stmt->bindParam(":Agencia", $this->Agencia);
        $stmt->bindParam(":Salario", $this->Salario);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readAll() {
        $query = "SELECT FuncionarioID, Codigo, Nome, Agencia, Salario 
                  FROM " . $this->table_name . " ORDER BY FuncionarioID DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
