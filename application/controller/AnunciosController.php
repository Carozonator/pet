<?php
namespace pluralpet;

class AnunciosController extends Controller{
    
    function __construct() {
        
    }
    
    function index(){
        $anuncio = new \pluralpet\Anuncio();
        $result = $anuncio->get(strtolower($this->request->getMethod()));
        
        $this->view->assign(array('data'=>$result));
        $this->view->setFile('anuncios');
        $this->view->render();
    }
    
    function delete(){
        $anuncio = new \pluralpet\Anuncio();
        $anuncio->delete();
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    
    
}

         