<?php
namespace pluralpet;

class Database{
    public static $instance;
    
    private function __construct(){}
    
    private function __clone() {}
    
    public static function getInstance(){
        if(!self::$instance){
            $db = new Database;
            self::$instance = $db->connect();
        }
        return self::$instance;
    }
    
    function connect(){
        try{
            $pdo = new \PDO("mysql:host=".DB_ADD.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        }catch(PDOException $ex){
            echo 'Unable to connect to database:' . $ex->getMessage();
            die;
        }
        $pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        return $pdo;
    }
}
?>