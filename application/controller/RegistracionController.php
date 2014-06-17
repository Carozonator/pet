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
        new SessionController();
        header('Location: /');
    }
}