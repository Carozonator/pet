<?php

namespace pluralpet;

class PreguntaController extends \pluralpet\Controller{
    
    function publicarPregunta(){
        if(empty($_SESSION['user'])){
            $_SESSION['pregunta_state']=$_POST;
            $this->view->setFilePath(ROOT.'application/module/account/login.php');
            $this->view->render();
            die;
        }
        if(empty($_POST['publication_id'])){
            $_POST=$_SESSION['pregunta_state'];
            unset($_SESSION['pregunta_state']);
        }
        $pregunta = new \pluralpet\Pregunta();
        $id =  $pregunta->publicarPregunta();
        if($id==1){
            header('Location: /'.$_POST['_table'].'/'.$_POST['publication_id']);
        }
        
    }
    
    function publicarRespuesta(){
        $pregunta = new \pluralpet\Pregunta();
        $pregunta->publicarRespuesta();
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}
