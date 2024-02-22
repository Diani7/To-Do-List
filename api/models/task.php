<?php
class Task{
  
    // conexión base de datos y nombre de la tabla
    
    private $table_name = "tasks";
  
    // object properties
    public $id;
    public $name;
    public $date;
    public $state;

  
    // constructor $db como conexión a la base de datos
    public function __construct($db){
        $this->conn = $db;
    }

    // función que permite leer las tareas
    function read(){
  
        // consultar todos los datos de la tabla
        $query = "SELECT * FROM tasks";

        // preparar declaración de consulta
        $preparedQuery = $this->conn->prepare($query);
    
        // ejecutar query
        $preparedQuery->execute();
    
        return $preparedQuery;
    }

    // función que permite crear las tareas
    function create(){
    
        // consulta para insertar registro
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, date=:date, state=:state";
    
        // preparar consulta
        $preparedQuery = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->state=htmlspecialchars(strip_tags($this->state));

        // vincular valores
        $preparedQuery->bindParam(":name", $this->name);
        $preparedQuery->bindParam(":date", $this->date);
        $preparedQuery->bindParam(":state", $this->state);

        // ejecutar query
        if($preparedQuery->execute()){
            return true;
        }
    
        return false;
 }

}
?>