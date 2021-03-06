<?php

namespace pluralpet;

class InformacionController extends Controller{
    function index(){
        $file = strtolower($this->request->getMethod());
        switch($file){
            case 'sobre-nosotros':
                $this->view->addHeadTag('<title>Sobre Nosotros | PluralPet</title>');
                $this->view->setFile($file);
            break;
            case 'sugerencias':
                $this->view->addHeadTag('<title>Sugerencias | PluralPet</title>');
                $this->view->setFile($file);
            break;
            case 'terminos-y-condiciones':
                $this->view->addHeadTag('<title>Terminos y Condiciones | PluralPet</title>');
                $this->view->setFile($file);
            break;
            case 'contacto-empresarial':
                $this->view->addHeadTag('<title>Contacto Empresarial | PluralPet</title>');
                $this->view->setFile($file);
            break;
            case 'politicas-de-privacidad':
                $this->view->addHeadTag('<title>Políticas De Privacidad | PluralPet</title>');
                $this->view->setFile($file);
            break;
            
        }
        
        $this->view->render();
    }
    
    function sugerenciaPost(){
        $msg = $_POST['message'];
        
        $email_message = '<h3>Consulta</h3><br/><br/>email: '.$_POST['email'].'<br/><br/>nombre: '.$_POST['name'].'<br/><br/>empresa: '.$_POST['empresa'].'<br/><br/>mensaje: '.$msg;
        
        $to = 'rafaelarcieri@gmail.com,juanangel_leira@hotmail.com';
        $subject = $_POST['name'].' tiene una consulta';
        $header = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $header .= 'From: PluralPet Consulta <support@pluralpet.com.uy >' . "\r\n";
        ini_set('SMTP', "relay-hosting.secureserver.net");
        ini_set('smtp_port', "25");
        
        if(mail($to, $subject, $email_message, $header)){
            $this->view->setMessage("Su mensaje ha sido enviado. Gracias por contactarnos <br/><br/><a href='/'>Volver a la pagina principal</a>");
        }else{
            $this->view->setMessage('Su mensaje no ha sido enviado. Por favor trate de devuelta');
        }
        
        $this->view->render();
    }
}