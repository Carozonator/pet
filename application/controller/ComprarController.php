<?php
namespace pluralpet;

class ComprarController extends Controller{
    
    function __construct() {
        
    }
    
    function index(){
        $anuncio = new \pluralpet\Mascota();
        $result = $anuncio->get(strtolower($this->request->getMethod()));
        
        $this->view->assign(array('data'=>$result));
        $this->view->setFile('mascota');
        $this->view->render();
    }
    
    function delete(){
        $anuncio = new \pluralpet\Mascota();
        $anuncio->delete();
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}