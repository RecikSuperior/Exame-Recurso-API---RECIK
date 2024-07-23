<?php

define('HOST', 'localhost');
define('DATABASENAME', 'sistemaimobiliario');
define('USER', 'root');
define('PASSWORD', '');

class Connect {
    public $connection;

    function __construct() {
        $this->connectDatabase();
    }

    function connectDatabase() {
        try {
            $this->connection = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASENAME, USER, PASSWORD);
        } catch (PDOException $e) {
            echo "Erro! " . $e->getMessage();
            die();
        }
    }
}

?>
