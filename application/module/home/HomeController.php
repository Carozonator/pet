<?php
namespace pluralpet;

class HomeController extends Controller{
    function index(){
        $mascota = new \pluralpet\Mascota();
        $perro = $mascota->getAllWhere('LEFT OUTER JOIN foto on mascota.id=foto.publication_id WHERE animal=? group by foto.publication_id order by id desc limit 5',
                array('perro'));
        $gato = $mascota->getAllWhere('LEFT OUTER JOIN foto on mascota.id=foto.publication_id WHERE animal=? group by foto.publication_id order by id desc limit 5', 
                array('gato'));
        $anuncio = new \pluralpet\Anuncio();
        $servicio = $anuncio->getAllJoinPhoto("where _table='anuncio' order by id desc",null);
        
        $p = new \pluralpet\Producto();
        $producto = $p->getAllJoinPhotoObj("where _table='producto' order by id desc",null);
        
        $this->view->assign(array('perro'=>$perro,'servicio'=>$servicio,'gato'=>$gato,'producto'=>$producto));
        $this->view->setFile('home');
        $this->view->render();
    }
}

