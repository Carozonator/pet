<?php
namespace pluralpet;

class AnunciosController extends Controller{
    
    function index(){
        
        $mascota = new \pluralpet\Anuncio();
        $result = $mascota->get(strtolower($this->request->getMethod()));
        $this->view->assign(array('data'=>$result));
        $this->view->setFile('anuncio');
        $this->view->render();
    }
    
    function criador(){
        echo 'here';
    }
    
}