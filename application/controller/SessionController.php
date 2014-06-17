<?php
namespace pluralpet;

class SessionController extends Controller{
    function __construct() {

    }
    
    function login(){
        $user = new User();
        if($result = ($user->valiateUser())){
            $_SESSION['user'] = $result;
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else{
            echo 'usuario no existe';
        }
    } 
    
    
    function logout(){
        $_SESSION = array();
        unset($_SESSION);
        header('Location: /');
    }
}