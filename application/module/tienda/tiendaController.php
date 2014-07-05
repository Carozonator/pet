<?php
namespace pluralpet;

class TiendaController extends Controller{
    
    function index(){
        
        $this->view->setFile('tiendalist');
        $this->view->render();
    }
    
}