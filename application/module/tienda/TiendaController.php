<?php
namespace pluralpet;

class TiendaController extends Controller{
    
    function index(){
        $this->filtro();
        /*
        $producto = new \pluralpet\Producto();
        $result = $producto->getAllJoinPhoto(NULL,NULL);
        
        $this->view->assign(array('data'=>$result));
        $this->view->setFile('tiendalist');
        $this->view->render();
         * 
         */
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
        //$fill['tab']=$tab;
        $fill['animal']=$animal;
        
        $page = $fill['page'];
        unset($fill['page']);
        
        $mascota = new \pluralpet\Producto();
        $result = $mascota->filter($fill);
        //test
        $list_count = count($result);
        $result = array_slice($result, $page*RESULTS_PER_PAGE,RESULTS_PER_PAGE);
        
        $this->view->assign(array('list_count'=>$list_count));
        $this->view->assign(array('data'=>$result));
        $this->view->assign(array('animal'=>$animal));
        $this->view->assign(array('tab'=>$tab));
        $this->view->setFile('tiendalist');
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
        if(count($fill)==0){
            $this->index();
        }
        
        $producto = new \pluralpet\Producto();
        $result = $producto->filter($fill);
        
        $this->view->assign(array('data'=>$result));
        $this->view->setFile('tiendalist');
        $this->view->render();
        */
    }
    
}