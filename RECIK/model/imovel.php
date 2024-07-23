<?php
require_once __DIR__ . '/../configuration/Connect.php';

class Imovel {
    private $conn;
    private $table_name = "imoveis";

    public $ImovelID;
    public $TipoImovel;
    public $AnoConstrucao;
    public $Area;
    public $Localizacao;
    public $Tipologia;
    public $Preco;
    public $ProprietarioID;

    public function __construct() {
        $database = new Connect();
        $this->conn = $database->connection;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET 
                  TipoImovel=:TipoImovel, 
                  AnoConstrucao=:AnoConstrucao, 
                  Area=:Area, 
                  Localizacao=:Localizacao, 
                  Tipologia=:Tipologia, 
                  Preco=:Preco, 
                  ProprietarioID=:ProprietarioID";

        $stmt = $this->conn->prepare($query);

        $this->TipoImovel = htmlspecialchars(strip_tags($this->TipoImovel));
        $this->AnoConstrucao = htmlspecialchars(strip_tags($this->AnoConstrucao));
        $this->Area = htmlspecialchars(strip_tags($this->Area));
        $this->Localizacao = htmlspecialchars(strip_tags($this->Localizacao));
        $this->Tipologia = htmlspecialchars(strip_tags($this->Tipologia));
        $this->Preco = htmlspecialchars(strip_tags($this->Preco));
        $this->ProprietarioID = htmlspecialchars(strip_tags($this->ProprietarioID));

        $stmt->bindParam(":TipoImovel", $this->TipoImovel);
        $stmt->bindParam(":AnoConstrucao", $this->AnoConstrucao);
        $stmt->bindParam(":Area", $this->Area);
        $stmt->bindParam(":Localizacao", $this->Localizacao);
        $stmt->bindParam(":Tipologia", $this->Tipologia);
        $stmt->bindParam(":Preco", $this->Preco);
        $stmt->bindParam(":ProprietarioID", $this->ProprietarioID);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readAll() {
        $query = "SELECT ImovelID, TipoImovel, AnoConstrucao, Area, Localizacao, Tipologia, Preco, ProprietarioID 
                  FROM " . $this->table_name . " ORDER BY ImovelID DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
