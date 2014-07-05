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
        header('Location: /anuncios/'.$_POST['tipo']);
    }
    
    function addMascota(){
        
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
        $mascota = new \pluralpet\Mascota();
        $mascota->add($image_name,$org_name);
        header('Location: /'.$_POST['tab'].'/'.$_POST['animal']);
        
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
}