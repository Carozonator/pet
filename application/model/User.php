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
    
    function checkEmail(){
        $sql = "SELECT * FROM user WHERE email=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['email']));
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
        $insert_id = $this->pdo->lastInsertId(); 
        //$affected_rows = $stmt->rowCount();
        return $insert_id;
    }
    
    function getPublicacionesStatus(){
        $publication = $this->getPublicaciones();
        $status=array('activo'=>0,'pausado'=>0,'finalizado'=>0);
        foreach($publication as $table){
            foreach($table as $row){
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
        }
        return $status;
    }
    
    function getPublicaciones(){
        $tables = array('mascota','anuncio','producto','consejo');
        
        $results=array();
        foreach($tables as $table){
            $sql =    "SELECT $table.*, foto.name as foto_name, foto.usuario as foto_usuario FROM user "
                    . "INNER JOIN $table on user.id=$table.usuario "
                    . "LEFT OUTER JOIN (SELECT * FROM foto where _table='$table' and foto.usuario=?) as foto on foto.publication_id= $table.id "
                    . "WHERE user.id=? "
                    . "GROUP BY foto.publication_id ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array($_SESSION['user']->id,$_SESSION['user']->id));
            $results[$table]=$stmt->fetchAll(\PDO::FETCH_OBJ);
            //$results = array_merge($results,);
        }
        
        return $results;
    }
    
    
    
    
    
    
    
    function getPublicacionesWithQuestions(){
        $tables = array('mascota','anuncio','producto');
        
        $results=array();
        foreach($tables as $table){
            $sql =    "SELECT pregunta.id as pregunta_id,pregunta.question, pregunta.question_timestamp, $table.*, foto.name as foto_name, foto.usuario as foto_usuario FROM user "
                    . "INNER JOIN $table on user.id=$table.usuario "
                    . "LEFT OUTER JOIN foto on foto.publication_id= $table.id "
                    . "LEFT OUTER JOIN pregunta on pregunta.publication_id= $table.id "
                    . "WHERE user.id=? and pregunta.answer is null and pregunta.question is not null "
                    . "GROUP BY pregunta.id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array($_SESSION['user']->id));
            $results[$table]=$stmt->fetchAll(\PDO::FETCH_OBJ);
            //$results = array_merge($results,);
        }
        //echo '<pre>';print_r($results);
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
        
        
        
        
        $changed = $_POST['column'];
        $user = $_SESSION['user'];
        require(ROOT.'application/module/email/datos_personales_modificados.php');
        
        return $affected_rows;
    }
    
    
    
    
    
    
    
    
    
    
    function findKey($key){
        $sql = "SELECT * FROM user WHERE temp_hash=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($key));
        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
        if(empty($rows)){
            return false;
        }else{
            return $rows[0];
        }
    }
    
    function clearUserTempHash($temp_hash){
        $sql = "UPDATE user SET temp_hash=null where temp_hash=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($temp_hash));
        $affected_rows = $stmt->rowCount();
        return $rs;
    }
    
    function updatePasswordFromHash($password,$temp_hash){
        
        $sql = "SELECT * FROM user where temp_hash=? ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($temp_hash));
        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
        $user = $rows[0];
        
        
        $sql = "UPDATE user SET temp_hash=null, password=? where temp_hash=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($password,$temp_hash));
        $affected_rows = $stmt->rowCount();
        
        $changed = "clave";
        require(ROOT.'application/module/email/datos_personales_modificados.php');
        
        
        return $affected_rows;
    }
    
    function updateUserTempHash($user_id){
        $rs = $this->randomString(24);
        $sql = "UPDATE user SET temp_hash=? where id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($rs,$user_id));
        $affected_rows = $stmt->rowCount();
        return $rs;
    }
    
    function randomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}