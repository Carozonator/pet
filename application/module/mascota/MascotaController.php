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
        
        $this->filtro();
        
    }
    
    function singleItem(){
        $mascota = new \pluralpet\Mascota();
        $result = $mascota->get($this->request->getMethod());
        $mascota->incrementViewCount($this->request->getMethod());
        
        $foto = new \pluralpet\Foto();
        $fotos = $foto->get($this->request->getMethod(),'mascota');
        
        
        $pregunta = new \pluralpet\Pregunta();
        $preguntas = $pregunta->get($this->request->getMethod(),'mascota');
        
        $this->view->assign(array('controller'=>strtolower($this->request->getController())));
        $this->view->assign(array('tab'=>$this->request->getTab()));
        $this->view->assign(array('foto'=>$fotos));
        $this->view->assign(array('pregunta'=>$preguntas));
        $this->view->assign(array('data'=>$result));
        
        $this->view->addHeadTag('<title>'.$result['titulo'].' | Mascota | PluralPet</title>');
        $this->view->addHeadTag('<meta property="og:title" content="'.$result['titulo'].'" />');
        $this->view->addHeadTag('<meta property="og:description" content="'.strip_tags($result['descripcion']).'" />');
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
        
        $animal = strtolower($this->request->getMethod());
        $tab = strtolower($this->request->getTab());
        
        
        
        
        
        $fill['tab']=$tab;
        $fill['animal']=$animal;
        $page = $fill['page'];
        unset($fill['page']);
        
        $mascota = new \pluralpet\Mascota();
        $result = $mascota->filter($fill);
        
        $list_count = count($result);
        $result = array_slice($result, $page*RESULTS_PER_PAGE,RESULTS_PER_PAGE);
        
        $this->view->addHeadTag('<title>Lista de Mascotas | PluralPet</title>');
        $content = "";
        if($tab=='adoptar'){
            $content = "Nos consideramos privilegiados de poder hacer la diferencia trabajando en conjunto con los principales refugios del país.";
        }elseif($tab=='perdido'){
            $content = "Nuestra sección dedicada a reunir mascotas con sus familias brindando una herramienta sencilla y de gran alcance.";
        }elseif($tab=='encontrado'){
            $content = "Nuestra sección dedicada a reunir mascotas con sus familias brindando una herramienta sencilla y de gran alcance.";
        }
        
        
        $this->view->addHeadTag('<meta name="description" content="'.$content.'">');
        
        
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
        
        // handle error when user is trying to edit another users publication
        if(intval($result['usuario']) !== intval($_SESSION['user']->id)){
            header('Location: /');
        }
        
        $foto = new \pluralpet\Foto();
        $fotos = $foto->get($id,'mascota');
        
        $this->view->assign(array('data'=>$result));
        $this->view->assign(array('foto'=>$fotos));
        $this->view->assign(array('id'=>$id));
        
        $this->view->setFile('mascotaedit');
        $this->view->render();
    }
    
    
    
    function delete(){
        $anuncio = new \pluralpet\Mascota();
        $anuncio->delete();
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}