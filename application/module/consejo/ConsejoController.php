<?php
namespace pluralpet;

class ConsejoController extends Controller{
    
    function index(){
        if(is_numeric($this->request->getMethod())){
            $this->singleItem();
            return;
        }
        //echo strtolower($this->request->getMethod());die;
        
        $anuncio = new \pluralpet\Consejo();
        $result = $anuncio->getAll(strtolower($this->request->getMethod()));
        $this->view->setFile('consejolist');
        $this->view->assign(array('data'=>$result));
        $this->view->assign(array('sub_tab'=>strtolower($this->request->getMethod())));
        $this->view->render();
    }
    
    function singleItem(){
        $anuncio = new \pluralpet\Consejo();
        $result = $anuncio->getByID($this->request->getMethod());
        
        $foto = new \pluralpet\Foto();
        $fotos = $foto->get($this->request->getMethod(),'consejo');
        
        $this->view->addHeadTag('<meta property="og:title" content="'.$result['titulo'].'" />');
        //$this->view->addHeadTag('<meta property="og:description" content="'.strip_tags($result['descripcion']).'" />');
        $this->view->addHeadTag('<meta property="og:image" content="'.DOMAIN.MEDIA.'upload/'.$fotos[0]['usuario'].'/'.$fotos[0]['name'].'" />');
        
        $this->view->assign(array('controller'=>strtolower($this->request->getController())));
        $this->view->addHeadTag('<meta property="og:title" content="'.$result['titulo'].'" />');
        $this->view->addHeadTag('<meta property="og:description" content="'.strip_tags($result['descripcion']).'" />');
        $this->view->addHeadTag('<meta property="og:image" content="'.DOMAIN.MEDIA.'upload/'.$fotos[0]['usuario'].'/'.$fotos[0]['name'].'" />');
        $this->view->assign(array('foto'=>$fotos));
        $this->view->assign(array('data'=>$result));
        $this->view->setFile('consejo');
        $this->view->render();
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
        $mascota = new \pluralpet\Consejo();
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