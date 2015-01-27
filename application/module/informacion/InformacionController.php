<?php

namespace pluralpet;

class InformacionController extends Controller{
    function index(){
        $file = strtolower($this->request->getMethod());
        switch($file){
            case 'sobre-nosotros':
                $this->view->setFile($file);
            break;
            case 'sugerencias':
                $this->view->setFile($file);
            break;
            
        }
        
        $this->view->render();
    }
}