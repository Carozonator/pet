<?php

namespace pluralpet;

class Informacion extends Model{
    function __construct() {
        parent::__construct();
        
    }
    
    function get(){
        $sql = "SELECT * FROM mascota WHERE mascota.id=260";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows[0];
    }
}