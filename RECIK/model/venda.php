<?php
require_once __DIR__ . '/../configuration/Connect.php';

class Venda {
    private $conn;
    private $table_name = "vendas";

    public $VendaID;
    public $Agencia;
    public $DataVenda;
    public $FuncionarioID;
    public $ImovelID;
    public $ProprietarioID;
    public $ClienteID;

    public function __construct() {
        $database = new Connect();
        $this->conn = $database->connection;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET 
                  Agencia=:Agencia, 
                  DataVenda=:DataVenda, 
                  FuncionarioID=:FuncionarioID, 
                  ImovelID=:ImovelID, 
                  ProprietarioID=:ProprietarioID, 
                  ClienteID=:ClienteID";

        $stmt = $this->conn->prepare($query);

        $this->Agencia = htmlspecialchars(strip_tags($this->Agencia));
        $this->DataVenda = htmlspecialchars(strip_tags($this->DataVenda));
        $this->FuncionarioID = htmlspecialchars(strip_tags($this->FuncionarioID));
        $this->ImovelID = htmlspecialchars(strip_tags($this->ImovelID));
        $this->ProprietarioID = htmlspecialchars(strip_tags($this->ProprietarioID));
        $this->ClienteID = htmlspecialchars(strip_tags($this->ClienteID));

        $stmt->bindParam(":Agencia", $this->Agencia);
        $stmt->bindParam(":DataVenda", $this->DataVenda);
        $stmt->bindParam(":FuncionarioID", $this->FuncionarioID);
        $stmt->bindParam(":ImovelID", $this->ImovelID);
        $stmt->bindParam(":ProprietarioID", $this->ProprietarioID);
        $stmt->bindParam(":ClienteID", $this->ClienteID);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readAll() {
        $query = "SELECT VendaID, Agencia, DataVenda, FuncionarioID, ImovelID, ProprietarioID, ClienteID 
                  FROM " . $this->table_name . " ORDER BY VendaID DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
