<?php
namespace pluralpet;

class RegistracionController extends Controller{
    
    function index(){
        
        $this->view->setFile('registracion');
        $this->view->render();
    }
    
    function registerUser(){
        $user = new User();
        $user->addUser();
        echo json_encode(array('success'=>true));
        die;
        new SessionController();
        header('Location: /');
    }
}