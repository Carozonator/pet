<?php
namespace pluralpet;

class AnuncioController extends Controller{
    
    function index(){
        if(is_numeric($this->request->getMethod())){
            $this->singleItem();
            return;
        }
        
        $mascota = new \pluralpet\Anuncio();
        $result = $mascota->get(strtolower($this->request->getMethod()));
        $this->view->assign(array('data'=>$result));
        $this->view->setFile('anunciolist');
        $this->view->render();
    }
    
    function singleItem(){
        $anuncio = new \pluralpet\Anuncio();
        $result = $anuncio->getByID($this->request->getMethod());
        $this->view->assign(array('anuncio'=>$result));
        $this->view->setFile('anuncio');
        $this->view->render();
    }
    
    function criador(){
        echo 'here';
    }
    
}