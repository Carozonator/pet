<?php
namespace pluralpet;

class Consejo extends Model{
    function __construct() {
        parent::__construct();
        
    }
    
    function add(){
        $sql =  "INSERT INTO consejo (sub_tab,titulo,link,departamento,ciudad_barrio,direccion,descripcion,horario,telefono,usuario,status)"
                . " VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['sub_tab'],$_POST['titulo'],$_POST['link'],$_POST['departamento'],
            $_POST['ciudad_barrio'],$_POST['direccion'],$_POST['descripcion'],
            $_POST['horario'],$_POST['telefono'],$_SESSION['user']->id,'activo'));
        $insert_id = $this->pdo->lastInsertId(); 
        
        $sql =  "UPDATE foto set publication_id=?,temp_hash=null where temp_hash=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($insert_id,$_POST['publication_hash']));
        
        $affected_rows = $stmt->rowCount();
        return $insert_id;
    }
    
    function delete(){
        $sql =  "DELETE FROM consejo WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['id']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    function get($type){
        $sql = "SELECT * FROM consejo WHERE sub_tab=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($type));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
    function getByID($id){
        $sql = "SELECT * FROM consejo WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows[0];
    }
    
    
    
    
    
    
    function getAll($type){
        if(strcmp($type,'index')===0){
            $sql = "SELECT consejo.*, foto.name as foto_name, foto.usuario as foto_usuario  FROM consejo LEFT OUTER JOIN foto on foto.publication_id=consejo.id "
                    . "where foto._table='consejo' group by consejo.id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
        /*else{
            $sql = "SELECT consejo.*, foto.name as foto_name, foto.usuario as foto_usuario  FROM consejo LEFT OUTER JOIN foto on foto.publication_id=consejo.id "
                    . "WHERE sub_tab=? group by consejo.id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array($type));
        }*/
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
    
    
    
    
    
    
    
    
    function getAllWhere($where_stmt,$where_vals){
        $sql = "SELECT * FROM consejo ".$where_stmt;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($where_vals);
        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }
    
    function getAllJoinPhoto($where_stmt,$where_vals){
        $sql = "SELECT consejo.*,foto.name as foto_name, foto.usuario as foto_usuario FROM consejo LEFT OUTER JOIN foto on consejo.id=foto.publication_id ".$where_stmt;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($where_vals);
        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }
    
    
    
    
    function updateStatus($status){
        $sql =  "UPDATE consejo set status=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($status,$_POST['id']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    
    
    
    
    function filter($vals){
        foreach($vals as $rows){
            $vals_decoded[]=urldecode($rows);
        }
        $stmt = implode("=? and ",array_keys($vals))."=? ";
        $sql = "SELECT * FROM consejo WHERE ".$stmt;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($vals_decoded);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
}