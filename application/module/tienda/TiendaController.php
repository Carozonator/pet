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
        unset($_GET['go']);
        foreach($_REQUEST as $key => $row){
            if(!empty($row)){
                $fill[$key]=$row;
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
        
        $list_count = count($result);
        $result = array_slice($result, $page*RESULTS_PER_PAGE,RESULTS_PER_PAGE);
        
        $this->view->assign(array('list_count'=>$list_count));
        $this->view->assign(array('data'=>$result));
        $this->view->assign(array('animal'=>$animal));
        $this->view->assign(array('tab'=>$tab));
        $this->view->setFile('tiendalist');
        $this->view->render();
        
        
    }
    
}