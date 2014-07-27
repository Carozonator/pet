<?php
namespace pluralpet;

class HomeController extends Controller{
    function index(){
        $mascota = new \pluralpet\Mascota();
        $perro = $mascota->getAllWhere('WHERE animal=? order by id desc limit 5', array('perro'));
        $gato = $mascota->getAllWhere('WHERE animal=? order by id desc limit 5', array('gato'));
        $anuncio = new \pluralpet\Anuncio();
        $servicio = $anuncio->getAllWhere('',null);
        $this->view->assign(array('perro'=>$perro,'servicio'=>$servicio,'gato'=>$gato));
        $this->view->setFile('home');
        $this->view->render();
    }
}

