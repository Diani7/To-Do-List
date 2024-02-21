<?php
class Task{
  
    // database connection and table name
    private $conn;
    private $table_name = "tareas";
  
    // object properties
    public $id;
    public $name;
    public $fecha;
    public $comprobar;

  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read taks
    function read(){
  
        // select all query
        $query = "SELECT * FROM tareas";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
}
?>