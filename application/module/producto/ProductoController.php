<?php
namespace pluralpet;

class ProductoController extends Controller{
    
    function index(){
        $producto = new \pluralpet\Producto();
        $result = $producto->get($this->request->getMethod());
        
        $foto = new \pluralpet\Foto();
        $fotos = $foto->get($this->request->getMethod(),'producto');
        
        $pregunta = new \pluralpet\Pregunta();
        $preguntas = $pregunta->get($this->request->getMethod(),'producto');
        
        $this->view->assign(array('pregunta'=>$preguntas));
        $this->view->assign(array('foto'=>$fotos));
        $this->view->assign(array('producto'=>$result));
        $this->view->setFile('producto');
        $this->view->render();
        
        
        
        
    }
    
}