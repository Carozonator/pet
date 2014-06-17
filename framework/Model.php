<?php
namespace pluralpet;

class Model{
    protected $pdo;
    
    function __construct() {
        $this->pdo = Database::getInstance();
    }
}
