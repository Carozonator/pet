<?php

namespace pluralpet;

class PreguntaController extends \pluralpet\Controller{
    
    function publicarPregunta(){
        if(empty($_SESSION['user'])){
            $this->view->setFilePath(ROOT.'application/module/account/login.php');
            $this->view->render();
            die;
        }
        $pregunta = new \pluralpet\Pregunta();
        $id =  $pregunta->publicarPregunta();
        if($id==1){
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        
    }
    
    function publicarRespuesta(){
        $pregunta = new \pluralpet\Pregunta();
        $pregunta->publicarRespuesta();
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}
