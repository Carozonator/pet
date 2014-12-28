<?php
namespace pluralpet;

class TiendaController extends Controller{
    
    function index(){
        
        $producto = new \pluralpet\Producto();
        $result = $producto->getAllJoinPhoto(NULL,NULL);
        
        $this->view->assign(array('data'=>$result));
        $this->view->setFile('tiendalist');
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
        if(count($fill)==0){
            $this->index();
        }
        
        $producto = new \pluralpet\Producto();
        $result = $producto->filter($fill);
        
        $this->view->assign(array('data'=>$result));
        $this->view->setFile('tiendalist');
        $this->view->render();
        
    }
    
}