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
        return $insert_id;
    }
    
    
    function addFromEditar($name,$org_name,$publication_id,$table){
        $sql =  "INSERT INTO foto (name,org_name,_table,publication_id,usuario,photo_order) VALUES(?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($name,$org_name,$table,$publication_id,$_SESSION['user']->id,20));
        $insert_id = $this->pdo->lastInsertId(); 
        return $insert_id;
    }
    
    
    function get($id,$table){
        $sql = "SELECT * FROM foto WHERE publication_id=? and _table=? order by photo_order";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id,$table));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
    
    
    function delete(){
        $sql =  "DELETE FROM foto WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['id']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    function deletePrePublish(){
        $sql =  "DELETE FROM foto WHERE name=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['filename']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    
    function updateOrder(){
        foreach($_POST['order'] as $key=>$row){
            $sql = "UPDATE foto set photo_order=? WHERE id=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array($row,$key));
        }
        
    }
}