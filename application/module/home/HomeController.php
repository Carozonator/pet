<?php
namespace pluralpet;

class HomeController extends Controller{
    function index(){
        $this->view->setFile('home');
        $this->view->render();
    }
}

