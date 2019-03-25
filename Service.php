<?php
class Service{

    // database connection and table name
    private $conn;
    private $table_name;

    public function __construct($db, $table){
        $this->conn = $db;
        $this->table_name = $table;
    }

    function getAll(){
        $query = "SELECT * FROM " . $this->table_name;
        $queryPrepared = $this->conn->prepare($query);
        $queryPrepared->execute();
        return $queryPrepared;
    }

    function getById($id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $queryPrepared = $this->conn->prepare($query);
        $queryPrepared->execute(array($id));
        return $queryPrepared;
    }

    function add($name, $destiny, $origin, $seats, $company, $directionCompany, $transferDate, $transferTime, $description){
        $query = "INSERT INTO " . $this->table_name . " (name, destiny, origin, seats, company, directionCompany, transferDate, transferTime, description)
                  VALUES (?,?,?,?,?,?,?,?,?)";
        $queryPrepared = $this->conn->prepare($query);
        $queryPrepared->execute(array($name, $destiny, $origin, $seats, $company, $directionCompany,
            $transferDate, $transferTime, $description));
    }
}