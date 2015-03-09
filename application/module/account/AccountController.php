<?php
namespace pluralpet;

class AccountController extends Controller{
    
    function index(){
        $user = new User();
        $pregunta = new \pluralpet\Pregunta();
        $this->view->assign(array('publicaciones'=>$user->getPublicacionesStatus()));
        $this->view->assign(array('user' => $user->get($_SESSION['user']->id)));
        $this->view->assign(array('pregunta'=>$pregunta));
        $this->view->setFile('summary');
        $this->view->render();
    }
    
    function publicados(){
        $user = new User();
        $this->view->assign(array('publicados'=>$user->getPublicaciones($_GET)));
        $this->view->setFile('publicados');
        $this->view->render();
    }
    
    function login(){
        $user = new User();
        if($result = ($user->valiateUser())){
            $_SESSION['user'] = $result;
            //header('Location: /account/');
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
    
    function register(){
        $user = new User();
        $user->addUser();
        echo json_encode(array('success'=>true));
        die;
        new SessionController();
        header('Location: /');
    }
    
    
    
    
    function contactar(){
        $user = new User();
        $response = $user->get($_GET['user_id']);
        $json = array('id'=>$response->id,'email'=>$response->email,'telefono'=>$response->phone,'firstname'=>$response->firstname,'lastname'=>$response->lastname);
        echo json_encode($json);
    }
    
    
    function updateUser(){
        $user = new User();
        $response = $user->updateUser($_POST);
        //echo $response;
        header('Location: /account/');
    }
    
}