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
        $this->view->assign(array('anuncio_type'=>strtolower($this->request->getMethod())));
        $this->view->render();
    }
    
    function singleItem(){
        $anuncio = new \pluralpet\Anuncio();
        $result = $anuncio->getByID($this->request->getMethod());
        
        $foto = new \pluralpet\Foto();
        $fotos = $foto->get($this->request->getMethod());
        
        $this->view->assign(array('foto'=>$fotos));
        $this->view->assign(array('anuncio'=>$result));
        $this->view->setFile('anuncio');
        $this->view->render();
    }
    
    function criador(){
        echo 'here';
    }
    
    
    function filtro(){
        $filters = $this->request->getArgs();
        $filters = explode('&',substr($filters[0],1));
        
        foreach($filters as $row){
            $temp = explode('=',$row);
            if(!empty($temp[1])){
                $fill[$temp[0]]=$temp[1];
            }
        }
        $mascota = new \pluralpet\Anuncio();
        $result = $mascota->filter($fill);
        $animal = strtolower($_REQUEST['animal']);
        $tab = strtolower($_REQUEST['tab']);
        $this->view->assign(array('data'=>$result));
        $this->view->assign(array('animal'=>$animal));
        $this->view->assign(array('tab'=>$tab));
        $this->view->setFile('anuncioList');
        $this->view->render();
        
    }
    
}