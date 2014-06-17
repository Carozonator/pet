<?php
namespace pluralpet;

class Controller{
    protected $request;
    protected $user;
    protected $args;
    protected $view;
    
    function setInitVal($request,$user,$view){
        $this->request = $request;
        $this->user = $user;
        $this->view = $view;
    }
    
    function init(){
        $methodName = $this->request->getMethod();
        $this->$methodName();
    }
    
    /***************************************************************************
     * When method doesn't exist in controller:
     * If method name is empty/number/? then go to index
     * ElseIf a subcontroller file exist then re instantiate Request and instantiate
     * the new controller
     * Else show 404 error
     */
    function __call($name,$args){
        
        $this->index();
        return;
        //$subcontroller = ROOT.'application/module/'.strtolower($this->request->getController()).'/'.ucfirst($this->request->getMethod()).'Controller.php';
        if(is_numeric($name) || $name=='' || substr($name, 0, 1) === '?'){
            $this->index();
        }elseif(file_exists ($subcontroller)){
            echo 'here';die;
            require_once $subcontroller;
            $this->request = new Request(substr($_SERVER['REQUEST_URI'],1));
            $act = $this->request->getPost('action');
            $action = empty($act) ? 'index' : $this->request->getPost('action');
            $con = FactoryController::build($this->request->getModule().'\\'.ucfirst($this->request->getController()).'Controller',$this->request);
            $con->$action();
        }else{
            //echo $this->request->getMethod();
            if(method_exists($this,'index')){
                $this->index();
            }else{
                $error = FactoryController::build('ErrorController');
                $error->setError('error404');
                //$error->init();
            }
            //$error = FactoryController::build('ErrorController');
            //$error->setError('error404');
            //$error->init();
        }
    }
    
}