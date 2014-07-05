<?php
namespace pluralpet;

class Anuncio extends Model{
    function __construct() {
        parent::__construct();
        
    }
    
    function add($image_name,$nombre_original){
        $sql =  "INSERT INTO anuncio (titulo,link,departamento,nombre_original,ciudad,barrio,direccion,foto_1,tipo,descripcion,horario,telefono,usuario,status)"
                . " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['titulo'],$_POST['link'],$_POST['departamento'],$nombre_original,
            $_POST['ciudad'],$_POST['barrio'],$_POST['direccion'],$image_name,$_POST['tipo'],$_POST['descripcion'],
            $_POST['horario'],$_POST['telefono'],$_SESSION['user']->id,'activo'));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    function delete(){
        $sql =  "DELETE FROM anuncio WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['id']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    function get($type){
        $sql = "SELECT * FROM anuncio WHERE tipo=?";
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
    
}