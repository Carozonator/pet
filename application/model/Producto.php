<?php
namespace pluralpet;

class Producto extends Model{
    function __construct() {
        parent::__construct();        
    }
    
    function add($image_name,$nombre_original){
        $sql =  "INSERT INTO producto "
                . "(`category`, `subcategory`, `departamento`, `ciudad_barrio`, "
                . "`usuario`, `foto_1`, `precio`, `titulo`,"
                . " `descripcion`, `status`)"
                . " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'activo')";
        echo  "|</br>category: ". $_POST['category'].
              "|</br>subcat: ".$_POST['subcategory'].
                "|</br>departamento: ".$_POST['departamento'].
                "|</br>ciudadbarrio: ".$_POST['ciudad_barrio'].
                "|</br>usuario: ".$_SESSION['user']->id.
                "|</br>image: ".$image_name.
                "|</br>precio: ".$_POST['precio'].
                "|</br>titulo: ".$_POST['titulo'].
                "|</br>descripcion: ".$_POST['descripcion'].
                "|";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            $_POST['category'],
            $_POST['subcategory'],
            $_POST['departamento'],
            $_POST['ciudad_barrio'],
            $_SESSION['user']->id,
            $image_name,
            $_POST['fecha'],
            $_POST['precio'],
            $_POST['titulo'],
            $_POST['descripcion'],
            $_POST['status']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    function delete(){
        $sql =  "DELETE FROM product WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['id']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    function getAll($type,$animal){
        $sql = "SELECT * FROM producto WHERE category=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($type,$animal));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
    function get($id){
        $sql = "SELECT * FROM producto WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows[0];
    }
    
    function filter($vals){
        foreach($vals as $rows){
            $vals_decoded[]=urldecode($rows);
        }
        $stmt = implode("=? and ",array_keys($vals))."=? ";
        $sql = "SELECT * FROM product WHERE ".$stmt;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($vals_decoded);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
}