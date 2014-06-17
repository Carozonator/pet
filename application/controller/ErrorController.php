<?php
namespace pluralpet;

class ErrorController extends Controller{
    
    function setError($method){
        $this->$method();
    }
    function error404(){
        $this->view->setFile('error');
        $this->view->assign(array('url' => $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']));
        $this->view->render();
    }
}