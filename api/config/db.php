<?php
    class Database{
    
        // especificación credenciales bases de datos 
        private $host = "localhost";
        private $db_name = "list_tasks";
        private $username = "root";
        private $password = "";
        public $conn;
    
        // función que permite obtener la conexión a la base de datos
        public function getConnection(){
    
            $this->conn = null;
    
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
    
            return $this->conn;
        }
    }
?>