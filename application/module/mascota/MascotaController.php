<?php
namespace pluralpet;

class MascotaController extends Controller{
    
    function __construct() {
        
    }
    
    function index(){
        if(is_numeric($this->request->getMethod())){
            $this->singleItem();
            return;
        }
        
        
        $mascota = new \pluralpet\Mascota();
        $result = $mascota->getAll(strtolower($this->request->getTab()),strtolower($this->request->getMethod()));
        
        $list_count = count($result);
        $result = array_slice($result, $page*5,($page+1)*5);
        
        $animal = strtolower($this->request->getMethod());
        
        
        $tab = strtolower($this->request->getTab());
        $this->view->assign(array('list_count'=>$list_count));
        $this->view->assign(array('data'=>$result));
        $this->view->assign(array('animal'=>$animal));
        $this->view->assign(array('tab'=>$tab));
        $this->view->setFile('mascotalist');
        $this->view->render();
    }
    
    function singleItem(){
        $mascota = new \pluralpet\Mascota();
        $result = $mascota->get($this->request->getMethod());
        
        $foto = new \pluralpet\Foto();
        $fotos = $foto->get($this->request->getMethod(),'mascota');
        
        $pregunta = new \pluralpet\Pregunta();
        $preguntas = $pregunta->get($this->request->getMethod(),'mascota');
        
        $this->view->assign(array('foto'=>$fotos));
        $this->view->assign(array('pregunta'=>$preguntas));
        $this->view->assign(array('mascota'=>$result));
        
        
        $this->view->addHeadTag('<meta property="og:title" content="'.$result['titulo'].' - '.moneda($result['moneda']).precio($result['precio']).'" />');
        //$this->view->addHeadTag('<meta property="og:description" content="'.strip_tags($result['descripcion']).'" />');
        $this->view->addHeadTag('<meta property="og:image" content="'.DOMAIN.MEDIA.'upload/'.$fotos[0]['usuario'].'/'.$fotos[0]['name'].'" />');
        $this->view->setFile('mascota');
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
        
        $page = $fill['page'];
        unset($fill['page']);
        
        
        $mascota = new \pluralpet\Mascota();
        $result = $mascota->filter($fill);
        
        $list_count = count($result);
        $result = array_slice($result, $page*5,($page+1)*5);
        
        
        $animal = strtolower($_REQUEST['animal']);
        $tab = strtolower($_REQUEST['tab']);
        $this->view->assign(array('list_count'=>$list_count));
        $this->view->assign(array('data'=>$result));
        $this->view->assign(array('animal'=>$animal));
        $this->view->assign(array('tab'=>$tab));
        $this->view->setFile('mascotaList');
        $this->view->render();
        
    }
    
    function editar(){
        $args = $this->request->getArgs();
        $id = $args[0];
        $mascota = new \pluralpet\Mascota();
        $result = $mascota->get($id);
        $this->view->assign(array('mascota'=>$result));
        //echo '<pre>';print_r($result);die;
        
        $this->view->setFile('mascotaedit');
        $this->view->render();
    }
    
    function delete(){
        $anuncio = new \pluralpet\Mascota();
        $anuncio->delete();
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}