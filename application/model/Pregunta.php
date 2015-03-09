<?php
namespace pluralpet;

class Pregunta extends Model{
    function __construct() {
        parent::__construct();
        
    }
    
    function publicarPregunta(){
        
        $sql =  "INSERT INTO pregunta (question,publication_id,_table,asker) VALUES(?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['question'],$_POST['publication_id'],$_POST['_table'],$_SESSION['user']->id));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    function getByRespondent(){
        $sql = "SELECT * FROM mascota inner join producto on mascota.usuario=producto.usuario inner join anuncio on anuncio.usuario=mascota.usuario where id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($table,$publication_id));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
    function get($publication_id,$table){
        $sql = "SELECT * FROM pregunta where _table=? and publication_id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($table,$publication_id));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
}