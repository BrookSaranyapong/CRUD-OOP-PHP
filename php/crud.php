<?php 
require_once('connect.php');
class CRUD Extends Database {

    public function fetchData(){
        $query = "SELECT * FROM tblusers";
        $stmt = $this->connection()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function fetchoneRecord($id){
        $query = "SELECT * FROM tblusers WHERE id = ? ";
        $stmt = $this->connection()->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function insertData($firstname, $lastname, $email, $phonenumber,$address,$postingdate){
        try{
            $sql = "INSERT INTO tblusers (firstname, lastname, email, phonenumber, address, postingdate) VALUES (?,?,?,?,?,?)";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute([$firstname, $lastname, $email, $phonenumber, $address, $postingdate]);
        }catch(PDOException $e){
            echo "Insert Error: ".$e->getMessage();
        }return $stmt; 
    }
    public function UpdateData($firstname, $lastname, $email, $phonenumber,$address,$postingdate,$id){
        try{
            $sql = "UPDATE tblusers SET firstname = ?, lastname = ?, email = ?, phonenumber = ?, address = ?, postingdate = ? WHERE id = ?";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute([$firstname, $lastname, $email, $phonenumber, $address, $postingdate, $id]);
        }catch(PDOException $e){
            echo "Update Error: ".$e->getMessage();
        }return $stmt; 
    }
    public function DeleteData($id){
        try{
            $sql = "DELETE FROM tblusers WHERE id = ?";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute([$id]);
        }catch(PDOException $e){
            echo "Delete Error: ".$e->getMessage();
        }return $stmt;
    }
}
?>