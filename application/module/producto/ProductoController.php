<?php
namespace pluralpet;

class ProductoController extends Controller{
    
    function index(){
        $producto = new \pluralpet\Producto();
        $result = $producto->get($this->request->getMethod());
        $producto->incrementViewCount($this->request->getMethod());
        
        $foto = new \pluralpet\Foto();
        $fotos = $foto->get($this->request->getMethod(),'producto');
        
        $pregunta = new \pluralpet\Pregunta();
        $preguntas = $pregunta->get($this->request->getMethod(),'producto');
        
        $this->view->addHeadTag('<meta property="og:title" content="'.$result['titulo'].'" />');
        //$this->view->addHeadTag('<meta property="og:description" content="'.strip_tags($result['descripcion']).'" />');
        $this->view->addHeadTag('<meta property="og:image" content="'.DOMAIN.MEDIA.'upload/'.$fotos[0]['usuario'].'/'.$fotos[0]['name'].'" />');
        
        $this->view->assign(array('controller'=>strtolower($this->request->getController())));
        $this->view->assign(array('pregunta'=>$preguntas));
        $this->view->assign(array('foto'=>$fotos));
        $this->view->assign(array('producto'=>$result));
        $this->view->setFile('producto');
        $this->view->render();
        
        
        
        
    }
    
    
    function oferta(){
        $model = new \pluralpet\Producto();
        $model->markAsOffer();
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    
    
    
}