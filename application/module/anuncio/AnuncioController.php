<?php
namespace pluralpet;

class AnuncioController extends Controller{
    
    function index(){
        
        
        if(is_numeric($this->request->getMethod())){
            $this->singleItem();
            return;
        }
        $this->filtro();
        
    }
    
    function singleItem(){
        $anuncio = new \pluralpet\Anuncio();
        $result = $anuncio->getByID($this->request->getMethod());
        $anuncio->incrementViewCount($this->request->getMethod());
        
        $foto = new \pluralpet\Foto();
        $fotos = $foto->get($this->request->getMethod(),'anuncio');
        
        $pregunta = new \pluralpet\Pregunta();
        $preguntas = $pregunta->get($this->request->getMethod(),'anuncio');
        
        $this->view->assign(array('controller'=>strtolower($this->request->getController())));
        $this->view->assign(array('pregunta'=>$preguntas));
        $this->view->assign(array('foto'=>$fotos));
        $this->view->assign(array('data'=>$result));
        
        $this->view->addHeadTag('<meta property="og:title" content="'.$result['titulo'].'" />');
        //$this->view->addHeadTag('<meta property="og:description" content="'.strip_tags($result['descripcion']).'" />');
        $this->view->addHeadTag('<meta property="og:image" content="'.DOMAIN.MEDIA.'upload/'.$fotos[0]['usuario'].'/'.$fotos[0]['name'].'" />');
        
        
        if(strcmp($result['sub_tab'],'evento')===0){
            $this->view->setFile('evento');
        }else{
            $this->view->setFile('anuncio');
        }
        $this->view->render();
    }
    
    function criador(){
        echo 'here';
    }
    
    
    function filtro(){
        
        
        unset($_GET['go']);
        foreach($_GET as $key => $row){
            if(!empty($row)){
                $fill[$key]=$row;
            }
        }
        $animal = strtolower($this->request->getMethod());
        $tab = strtolower($this->request->getTab());
        
        //$fill['tab']=$tab;
        $fill['sub_tab']=$animal;
        
        $page = $fill['page'];
        unset($fill['page']);
        
        $mascota = new \pluralpet\Anuncio();
        $result = $mascota->filter($fill);
        
        $list_count = count($result);
        $result = array_slice($result, $page*RESULTS_PER_PAGE,RESULTS_PER_PAGE);
        
        $this->view->assign(array('list_count'=>$list_count));
        $this->view->assign(array('data'=>$result));
        $this->view->assign(array('animal'=>$animal));
        $this->view->assign(array('tab'=>$tab));
        $this->view->setFile('anuncioList');
        $this->view->render();
        
        
        
        
        
        
        /*
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
        */
    }
    
}