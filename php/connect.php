<?php 
    class Database{
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $dbname = "Crud_oop";
        private $charset = "utf8";
        private $conn = null;
    
        public function connection(){
            try{
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset", $this->user, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "Connection Error: ".$e->getMessage();
            }return $this->conn;
        }
    }
    $conn = new Database();
    $connection = $conn->connection();
        
?>