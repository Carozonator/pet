<?php
namespace pluralpet;

class TiendaController extends Controller{
    
    function index(){
        
        $this->view->setFile('tienda');
        $this->view->render();
    }
    
}