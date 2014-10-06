<?php
namespace pluralpet;

class Foto extends Model{
    function __construct() {
        parent::__construct();
        
    }
    
    function add($name,$org_name,$temp_hash,$table){
        $sql =  "INSERT INTO foto (name,org_name,temp_hash,_table,publication_id,usuario,photo_order) VALUES(?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($name,$org_name,$temp_hash,$table,null,$_SESSION['user']->id,1));
        $insert_id = $this->pdo->lastInsertId(); 
        //$affected_rows = $stmt->rowCount();
        return $insert_id;
    }
    
    
    
    function get($id){
        $sql = "SELECT * FROM foto WHERE publication_id=? order by photo_order";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
    
    
    function delete(){
        $sql =  "DELETE FROM mascota WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['id']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
}