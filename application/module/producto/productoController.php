<?php
namespace pluralpet;

class ProductoController extends Controller{
    
    function index(){
        echo 'here';die;
        $producto = new \pluralpet\Producto();
        $result = $producto->get($this->request->getMethod());
        
        //$foto = new \pluralpet\Foto();
        //$fotos = $foto->get($this->request->getMethod(),'producto');
        
        //$this->view->assign(array('foto'=>$fotos));
        $this->view->assign(array('producto'=>$result));
        $this->view->setFile('producto');
        $this->view->render();
        
        
        
    }
    
}