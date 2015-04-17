<?php
namespace pluralpet;

class Anuncio extends Model{
    function __construct() {
        parent::__construct();
        
    }
    
    function add(){
        //header("Content-type: text/plain");
        //print_r($_POST);die;
        $sql =  "INSERT INTO anuncio (sub_tab,titulo,link,departamento,ciudad_barrio,direccion,descripcion,horario,telefono,usuario,status)"
                . " VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['tipo'],$_POST['titulo'],$_POST['link'],$_POST['departamento'],
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
        $sql =  "DELETE FROM anuncio WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['id']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    function get($type){
        $sql = "SELECT * FROM anuncio WHERE sub_tab=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($type));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
    function getByID($id){
        $sql = "SELECT * FROM anuncio WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows[0];
    }
    
    
    
    
    
    
    function getAll($type){
        
        $sql = "SELECT anuncio.*, foto.name as foto_name, foto.usuario as foto_usuario  FROM anuncio LEFT OUTER JOIN foto on foto.publication_id=anuncio.id "
                . "WHERE sub_tab=? group by anuncio.id";
        
        
        
        //$sql = "SELECT * FROM mascota WHERE tab=? and animal=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($type));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
    
    
    
    
    
    
    
    
    function getAllWhere($where_stmt,$where_vals){
        $sql = "SELECT * FROM anuncio ".$where_stmt;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($where_vals);
        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }
    
    function getAllJoinPhoto($where_stmt,$where_vals){
        $sql = "SELECT anuncio.*,foto.name as foto_name, foto.usuario as foto_usuario FROM anuncio LEFT OUTER JOIN foto on anuncio.id=foto.publication_id ".$where_stmt;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($where_vals);
        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }
    
    
    
    
    function incrementViewCount($id){
        $sql =  "UPDATE anuncio set views=views+1 WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    function updateStatus($status){
        $sql =  "UPDATE anuncio set status=? WHERE id=?";
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
        $sql = "SELECT * FROM anuncio WHERE ".$stmt;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($vals_decoded);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
}