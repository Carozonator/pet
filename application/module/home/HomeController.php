<?php
namespace pluralpet;

class HomeController extends Controller{
    function index(){
        $mascota = new \pluralpet\Mascota();
        $perro = $mascota->getAllWhere('LEFT OUTER JOIN foto on mascota.id=foto.publication_id WHERE animal=? and tab=\'comprar\' group by foto.publication_id order by views desc limit 5',
                array('perro'));
        $gato = $mascota->getAllWhere('LEFT OUTER JOIN foto on mascota.id=foto.publication_id WHERE animal=? and tab=\'comprar\' group by foto.publication_id order by views desc limit 5', 
                array('gato'));
        $anuncio = new \pluralpet\Anuncio();
        $servicio = $anuncio->getAllJoinPhoto("where _table='anuncio' and anuncio.sub_tab!='evento' group by foto.publication_id order by views desc limit 5",null);
        
        
        $o = new \pluralpet\Producto();
        $oferta = $o->getAllJoinPhotoObj("where _table='producto' and oferta>1 group by foto.publication_id order by oferta desc limit 5",null);
        
        
        $p = new \pluralpet\Producto();
        $producto = $p->getAllJoinPhotoObj("where _table='producto' group by foto.publication_id order by views desc limit 5",null);
        
        
        $articulos = array();
        
        $p = new \pluralpet\Consejo();
        $articulos['consejo'] = $p->getAllJoinPhoto("where _table='consejo'  order by id desc limit 1",null);
        
        
        $p = new \pluralpet\Anuncio();
        $articulos['anuncio'] = $p->getAllJoinPhoto("where _table='anuncio' and anuncio.sub_tab='evento' order by id desc limit 1",null);
        
        
        //$p = new \pluralpet\Consejo();
        //$anuncio_otro = $p->getAllJoinPhoto("where _table='anuncio' and anuncio.sub_tab='otros' order by id desc limit 1",null);
        
        $this->view->assign(array('oferta'=>$oferta,'perro'=>$perro,'servicio'=>$servicio,'gato'=>$gato,'producto'=>$producto,'articulos'=>$articulos));
        $this->view->setFile('home');
        $this->view->render();
    }
}

