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
        /*
        // the message
        $msg = $_POST['message'];

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        mail("rafaelarcieri@gmail.com","My subject",$msg);
        */
        
        $to = 'rafaelarcieri@gmail.com';
        $subject = '';
        $header = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $header .= 'From: Administrator <info@pluralpet.com.uy >' . "\r\n";
        ini_set('SMTP', "relay-hosting.secureserver.net");
        ini_set('smtp_port', "25");
        
        if(mail($to, $subject, $msg, $header)){
            echo 'true';
        }
        
        echo 'Thank you';
    }
}