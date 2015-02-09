<?php

namespace pluralpet;

class InformacionController extends Controller{
    function index(){
        $file = strtolower($this->request->getMethod());
        switch($file){
            case 'sobre-nosotros':
                $this->view->setFile($file);
            break;
            case 'sugerencias':
                $this->view->setFile($file);
            break;
            
        }
        
        $this->view->render();
    }
    
    function sugerenciaPost(){
        $msg = $_POST['message'];
        
        $email_message = $_POST['email'].'<br/><br/>'.$_POST['name'].'<br/><br/>'.$msg;
        
        $to = 'rafaelarcieri@gmail.com';
        $subject = '';
        $header = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $header .= 'From: PluralPet <support@pluralpet.com.uy >' . "\r\n";
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