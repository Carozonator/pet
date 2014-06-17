<?php
namespace pluralpet;


class Request{
	echo "entramos";
    private $_controller;
    private $_method;
    private $_args;
    private $_module;
    private $_subcontroller;
    private $_post;
    private $_tab;

    public function __construct($uri = null){
        $server_uri = ($uri?$uri:$_SERVER['REQUEST_URI']);
        $parts = explode('/',$server_uri);
        array_shift($parts);
        //$this->_module = array_shift($parts);
        $this->_controller = ($c = array_shift($parts))? ucfirst($c): 'home';
        $mascota = array('Comprar'=>true,'Adoptar'=>true,'Perdidos-y-encontrados'=>true,'Cruzar'=>true);
        if($mascota[$this->_controller]){
            $this->_tab=$this->_controller;
            $this->_controller='Mascota';
        }
        //$this->_tab = (empty($this->_module)?$this->_controller:$this->_module);
        
        $this->_method = ($c = array_shift($parts))? ucfirst($c): 'index';
        $this->_args = (isset($parts[0])) ? $parts : array();
        $this->_post = $_POST;
        /*echo '<pre>';
        print_r($this);
        die;*/
    }
    
    public function setModule($module){
        $this->_module= $module;
    }
    
    public function setController($controller){
        $this->_controller= $controller;
    }
    /*
    public function findController($parts){
        $this->_controller = ($c = array_shift($parts))? ucfirst($c): 'home';
        $this->_subcontroller = array_shift($parts);
        
        if(is_numeric($this->_subcontroller)){
            $this->_method = 'index';
        }
        elseif(empty($this->_subcontroller)){
            $this->_method = 'index';
        }
        else{
            $this->_module=$this->_controller;
            $retry = array_merge(array($this->_subcontroller),$parts);
            $this->findController($retry);
        }
    }
    */
    public function getTab(){
        return $this->_tab;
    }
    public function getModule(){
        return $this->_module;
    }
    public function getController(){
        return $this->_controller;
    }
    public function getMethod(){
        return $this->_method;
    }
    public function getArgs(){
        return $this->_args;
    }
    public function getPost($name = NULL){
        if(is_null($name)){
            return $this->_post;
        }else{
            return $this->_post[$name];
        }
        
    }
}