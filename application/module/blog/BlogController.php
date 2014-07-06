<?php
namespace pluralpet;

class BlogController extends Controller{
    
    function __construct() {
        
    }
    
    function index(){
        $this->view->render();
    }
    
}