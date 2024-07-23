<?php
require_once __DIR__ . '/../configuration/Connect.php';

class Proprietario {
    private $conn;
    private $table_name = "proprietarios";

    public $ProprietarioID;
    public $Nome;
    public $Email;
    public $Telefone;
    public $Password;
    public $Aprovado;

    public function __construct() {
        $database = new Connect();
        $this->conn = $database->connection;
    }

    public function create() {
        if ($this->emailExists($this->Email)) {
            return "Email já cadastrado.";
        }

        $query = "INSERT INTO " . $this->table_name . " SET 
                  Nome=:Nome, 
                  Email=:Email, 
                  Telefone=:Telefone, 
                  Password=:Password, 
                  Aprovado=:Aprovado";

        $stmt = $this->conn->prepare($query);

        $this->Nome = htmlspecialchars(strip_tags($this->Nome));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Telefone = htmlspecialchars(strip_tags($this->Telefone));
        $this->Password = htmlspecialchars(strip_tags($this->Password));
        $this->Aprovado = htmlspecialchars(strip_tags($this->Aprovado));

        $stmt->bindParam(":Nome", $this->Nome);
        $stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":Telefone", $this->Telefone);
        $stmt->bindParam(":Password", $this->Password);
        $stmt->bindParam(":Aprovado", $this->Aprovado);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    private function emailExists($email) {
        $query = "SELECT ProprietarioID FROM " . $this->table_name . " WHERE Email = :Email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Email", $email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function readAll() {
        $query = "SELECT ProprietarioID, Nome, Email, Telefone, Aprovado 
                  FROM " . $this->table_name . " ORDER BY ProprietarioID DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
