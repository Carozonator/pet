<?php
namespace pluralpet;

class User extends Model{
    function __construct() {
        parent::__construct();
        
    }
    
    function checkUserExists(){
        $sql = "SELECT * FROM user WHERE username=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['username']));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!empty($rows)){
            $error = array('error'=>true,'location'=>'username','message'=>'Nombre de usuario ya existe. Por favor eliga otro');
            echo json_encode($error);
            die;
        }
        $sql = "SELECT * FROM user WHERE email=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['email']));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!empty($rows)){
            $error = array('error'=>true,'location'=>'email','message'=>'Email seleccionado ya tiene una cuenta registrada');
            echo json_encode($error);
            die;
        }
    }
    
    function valiateUser(){
        $sql = "SELECT * FROM user WHERE password=? and (email=? or username=?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['password'],$_POST['user'],$_POST['user']));
        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
        if(empty($rows)){
            return false;
        }else{
            return $rows[0];
        }
    }
    
    function addUser(){
        $this->checkUserExists();
        $sql = "INSERT INTO user (firstname,lastname,email,password,phone,username,document) VALUES(?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['password'],$_POST['phone'],$_POST['username'],$_POST['documento']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    function getPublicacionesStatus(){
        $publication = $this->getPublicaciones();
        $status=array('activo'=>0,'pausado'=>0,'finalizado'=>0);
        foreach($publication as $row){
            switch($row->status){
                case '':
                    $status['activo']+=1;
                break;
                case 'activo':
                    $status['activo']+=1;
                break;
                case 'pausado':
                    $status['pausado']+=1;
                break;
                case 'finalizado':
                    $status['finalizado']+=1;
                break;
            }
        }
        return $status;
    }
    
    function getPublicaciones(){
        $tables = array('mascota','anuncio');
        
        $results=array();
        foreach($tables as $table){
            $sql =    "SELECT $table.* FROM user "
                    . "INNER JOIN $table on user.id=$table.usuario "
                    . "WHERE user.id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array($_SESSION['user']->id));
            $results[$table]=$stmt->fetchAll(\PDO::FETCH_OBJ);
            //$results = array_merge($results,);
        }
        
        return $results;
    }
    
    
    
    
    
    
    
    
    function get($id){
        $sql = "SELECT * FROM user WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
        $results = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $results[0];
    }
    
    function updateUser($response){
        $sql = "UPDATE user SET ".$_POST['column']."=? where id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['value'],$_SESSION['user']->id));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
}