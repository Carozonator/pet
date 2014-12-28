<?php
namespace pluralpet;

class FactoryController{
    
    public function build($controller_name,$internal_request = null)
    {
        $request = (is_null($internal_request)?self::buildRequest():$internal_request);
        //$user = self::buildUser($request);
        $view = self::buildView($request);
        
        $controller_name = __NAMESPACE__.'\\'.$controller_name;
        echo ROOT.'application/module/'.strtolower($request->getController()).'/'.ucfirst($request->getController()).'Controller.php';
        require_once ROOT.'application/module/'.strtolower($request->getController()).'/'.ucfirst($request->getController()).'Controller.php';
        /*
        if(! class_exists($controller_name)){
            $error = FactoryController::build('ErrorController');
            $error->init();
            die;
        }
        */
        $controller = new $controller_name();
        $controller->setInitVal($request,null,$view);
        return $controller;
    }

    public function buildRequest()
    {
        return new Request();
    }

    public function buildUser($request)
    {
        return new User($request);
    }
    
    public function buildView($request)
    {
        return new View($request);
    }
}