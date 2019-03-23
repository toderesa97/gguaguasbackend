<?php
class Service{

    // database connection and table name
    private $conn;
    private $table_name = "minibus";

    public function __construct($db){
        $this->conn = $db;
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
        $query = "INSERT INTO minibus (name, destiny, origin, seats, company, directionCompany, transferDate, transferTime, description)
                  VALUES (?,?,?,?,?,?,?,?,?)";
        $queryPrepared = $this->conn->prepare($query);
        $queryPrepared->execute(array($name, $destiny, $origin, $seats, $company, $directionCompany,
            $transferDate, $transferTime, $description));
    }
}