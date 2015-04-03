<?php
namespace pluralpet;

class RegistracionController extends Controller{
    
    function index(){
        $this->view->setMessage("Tu cuenta ha sido confirmada. <br/><br/>Gracias por registrarte a PluralPet! ");
        //$this->view->setFile('registracion');
        $this->view->render();
    }
    
    function registerUser(){
        $user = new User();
        $user->addUser();
        include(ROOT.'application/module/email/confirma_registracion.php');
        //$this->view->render();
        //die;
        echo json_encode(array('success'=>true));
        die;
        new SessionController();
        header('Location: /');
    }
    
    function confirmar(){
        $this->view->setMessage("Chequea tu email para finalizar la registraci&oacute;n");
        $this->view->render();
        
    }
}