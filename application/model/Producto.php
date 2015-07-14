<?php
namespace pluralpet;

class Producto extends Model{
    function __construct() {
        parent::__construct();        
    }
    
    
    
    
    function add(){
        
        $sql =  "INSERT INTO producto (animal,tab,precio,titulo,descripcion,departamento,ciudad_barrio,usuario,status,moneda,vendedor_id)"
                . " VALUES(?,?,?,?,?,?,?,?,'activo',?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['animal'],$_POST['tab'],parseMoney($_POST['precio']),$_POST['titulo'],
            $_POST['descripcion'],$_POST['departamento'],$_POST['ciudad_barrio'],$_SESSION['user']->id,$_POST['moneda'],$_POST['vendedor_id']));
        $insert_id = $this->pdo->lastInsertId(); 
        
        // Update foto with the new added publication id
        $sql =  "UPDATE foto set publication_id=?,temp_hash=null where temp_hash=? and usuario=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($insert_id,$_POST['publication_hash'],$_SESSION['user']->id));
        
        return $insert_id;
    }
    
    
    
    
    
    
    
    
    function addOld($image_name,$nombre_original){
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
        $sql =  "DELETE FROM producto WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['id']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    function getAll($type,$animal){
        $sql = "SELECT * FROM producto ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();//array($type,$animal)
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
    
    
    function getAllJoinPhoto($where_stmt,$where_vals){
        $sql = "SELECT producto.*,foto.name as foto_name, foto.usuario as foto_usuario FROM producto LEFT OUTER JOIN (select * from foto order by photo_order,id) as foto on producto.id=foto.publication_id ".$where_stmt;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();//$where_vals);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
    function getAllJoinPhotoObj($where_stmt,$where_vals){
        $sql = "SELECT producto.*,foto.name as foto_name, foto.usuario as foto_usuario FROM producto LEFT OUTER JOIN (select * from foto order by photo_order,id) as foto on producto.id=foto.publication_id ".$where_stmt;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();//$where_vals);
        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }
    
    
    
    
    
    
    
    
    
    
    function updateStatus($status){
        $sql =  "UPDATE producto set status=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($status,$_POST['id']));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    function update($id){
        
        $sql =  "UPDATE producto set animal=?, tab=?,titulo=?,descripcion=?,departamento=?,ciudad_barrio=?,precio=?,moneda=?,vendedor_id=? "
                . "WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_POST['tab_select'],$_POST['tab_tipo'],$_POST['titulo'],
            $_POST['descripcion'],$_POST['departamento'] ,$_POST['ciudad_barrio'],parseMoney($_POST['precio']),
            $_POST['moneda'],$_POST['vendedor_id'],intval($id)));
        return $id;
    }
    
    function get($id){
        $sql = "SELECT * FROM producto WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows[0];
    }
    
    function incrementViewCount($id){
        $sql =  "UPDATE producto set views=views+1 WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    
    
    
    
    
    
    
    function filter($vals){
       //print_r($vals);die;
        $orden = $vals['orden'];
        unset($vals['orden']);
        $vals['status']='activo';
        switch($orden){
            case 'barato':
                $order_by = "ORDER BY precio_sum";
            break;
            case 'caro':
                $order_by = "ORDER BY precio_sum DESC";
            break;
            case 'visitas':
                $order_by = "ORDER BY views DESC";
            break;
            default:
                $order_by = "ORDER BY id DESC";
            break;
        }
        $order_by.=", foto.photo_order ";
        
        $tabs = $vals['tab'];
        unset($vals['tab']);
        unset($vals['PHPSESSID']);// hot fix for prod
        foreach($vals as $rows){
            $vals_decoded[]=urldecode($rows);
        }
        
        if(!empty($vals)){
            $stmt = "WHERE ".implode("=? and ",array_keys($vals))."=? ";
        }
        
        if(count($tabs)>0){
            if(empty($stmt)){
                $stmt=" WHERE ";
            }else{
                $stmt.=" and ";
            }
            $stmt.= " (tab='".implode("' or tab='",$tabs)."') ";
        }
        
        //adjust _table accordingly 
        $sql =    "SELECT producto.*, foto.name as foto_name, foto.usuario as foto_usuario, foto.photo_order, "
                . "CASE WHEN producto.moneda = 'us' THEN producto.precio * ".CAMBIO." ELSE producto.precio END AS `precio_sum` "
                . "FROM producto "
                . "LEFT OUTER JOIN (SELECT name, usuario,photo_order,publication_id,id FROM foto WHERE _table='producto' order by photo_order,id) "
                . "AS foto on foto.publication_id=producto.id "
                . "$stmt "
                . "group by producto.id "
                . "$order_by ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($vals_decoded);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    /*
    function filter($vals){
        foreach($vals as $rows){
            $vals_decoded[]=urldecode($rows);
        }
        $stmt = implode("=? and ",array_keys($vals))."=? ";
        $sql = "SELECT producto.*,foto.name as foto_name, foto.usuario as foto_usuario FROM producto LEFT OUTER JOIN foto on producto.id=foto.publication_id WHERE ".$stmt;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($vals_decoded);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    */
    
    
    
    
    
    function markAsOffer(){
        if(isset($_POST['oferta_checkbox'])){
            $date = time();
        }else{
            $date = 0;
        }
        $sql =  "UPDATE producto set oferta=? where id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($date,$_POST['id']));
        
    }
}