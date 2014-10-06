<?php
namespace pluralpet;

class PublicarController extends \pluralpet\Controller{
    
    function index(){
        if(empty($_SESSION['user'])){
            $this->view->setFilePath(ROOT.'application/module/account/login.php');
            $this->view->render();
            die;
        }
        $this->view->setFile($this->request->getMethod());
        $this->view->render();
    }
    
    function description(){
        include ROOT.'application/module/publicar/description.php';
        //$this->view->setFile('description');
        //$this->view->render();
    }
    
    
    
    
    function delete(){
        $table = '\pluralpet\\'.ucfirst($_POST['table']);
        $model = new $table();
        $model->delete();
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    
    
    
    
    
    
    function addAnuncio(){
        if ($_FILES["file"][0]["error"] > 0)
        {
            echo "Error:<br/>";
            echo "<pre>";
            print_r($_FILES["file"]["error"]);
            die;
        }
        else
        {
            $counter=0;
            foreach($_FILES['file'] as $k=>$file){
                foreach($file as $key=>$row){
                    if(strcmp($k,'name')==0){
                        $name = $row;
                        $org_name = $name;
                    }
                    if(strcmp($k,'tmp_name')==0){
                        $ext = substr($name, strrpos($name, '.')+1);
                        $image_name = time().'.'.$ext;
                        move_uploaded_file($row, UPLOAD.time().'.'.$ext);
                    }
                    //echo "$k: " . $row . "<br>";
                }
            }
        }
        $mascota = new \pluralpet\Anuncio();
        $mascota->add($image_name,$org_name);
        header('Location: /anuncio/'.$_POST['tipo']);
    }
    
    
    
    function addPhoto(){
        $upload_dir = UPLOAD.$_SESSION['user']->id;
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $upload_entry_dir = $upload_dir;//.'/'.$_POST['publication_id'];

        if ($_FILES["file"][0]["error"] > 0)
        {
            echo "Error:<br/>";
            echo "<pre>";
            print_r($_FILES["file"]["error"]);
            die;
        }
        else
        {
            if (file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name'])){
                $file_name = basename($_FILES['file']['name']);
                $ext = substr($_FILES["file"]['name'], strrpos($_FILES["file"]['name'], '.')+1);
                $image_name = time().'_'.substr(rand(),0,5).'.'.$ext;
                
                $foto = new \pluralpet\Foto();
                $foto->add($image_name,$file_name,$_POST['publication_hash'],'mascota');
                
                move_uploaded_file($_FILES["file"]['tmp_name'],$upload_entry_dir.'/'.$image_name);
            }
        }
        echo 'here';die;
    }
    
    
    
    function addMascota(){
        
        $mascota = new \pluralpet\Mascota();
        echo $mascota->add();
        //header('Location: /'.$_POST['tab'].'/'.$_POST['animal']);
        
    }
    
    function addProducto(){
        
        if ($_FILES["file"][0]["error"] > 0)
        {
            echo "Error:<br/>";
            echo "<pre>";
            print_r($_FILES["file"]["error"]);
            die;
        }
        else
        {
            $counter=0;
            foreach($_FILES['file'] as $k=>$file){
                foreach($file as $key=>$row){
                    if(strcmp($k,'name')==0){
                        $name = $row;
                        $org_name = $name;
                    }
                    if(strcmp($k,'tmp_name')==0){
                        $ext = substr($name, strrpos($name, '.')+1);
                        $image_name = time().'.'.$ext;
                        move_uploaded_file($row, UPLOAD.time().'.'.$ext);
                    }
                    //echo "$k: " . $row . "<br>";
                }
            }
        }
        $producto = new \pluralpet\Producto();
        $producto->add($image_name,$org_name);
        header('Location: /'.$_POST['tab'].'/'.$_POST['animal']);     
    }
    
    
    
    
    
    
    //http://localhost/account/publicados/?status=activo
    function modify(){
        switch($_POST['event']){
            case 'editar':
                header('Location: /'.$_POST['table'].'/'.$_POST['id']);
            break;
            case 'borrar':
                $this->delete();
            break;
            default:
                $table = '\pluralpet\\'.ucfirst($_POST['table']);
                $model = new $table();
                $model->updateStatus($_POST['event']);
                header('Location: /account');    
            break;
            
        }
    }
    
}