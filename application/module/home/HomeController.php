<?php
namespace pluralpet;

class HomeController extends Controller{
    function index(){
        $mascota = new \pluralpet\Mascota();
        $perro = $mascota->getAllWhere('LEFT OUTER JOIN foto on mascota.id=foto.publication_id WHERE animal=? group by foto.publication_id order by id desc limit 4',
                array('perro'));
        $gato = $mascota->getAllWhere('LEFT OUTER JOIN foto on mascota.id=foto.publication_id WHERE animal=? group by foto.publication_id order by id desc limit 4', 
                array('gato'));
        $anuncio = new \pluralpet\Anuncio();
        $servicio = $anuncio->getAllJoinPhoto('',null);
        $this->view->assign(array('perro'=>$perro,'servicio'=>$servicio,'gato'=>$gato));
        $this->view->setFile('home');
        $this->view->render();
    }
}

