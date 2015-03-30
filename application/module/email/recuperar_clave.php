<?php


$to      = $user->email;
$subject = 'Recuperar Email';
$message = '<html>'
        . '<body>'
        . '<img style="width:200px;height:auto" src="'.DOMAIN.'/media/logo.png"/>'
        . '<p>Hola '.$user->firstname.',</p>'
        . '<p>Recupera tu clave para usar tu cuenta</p>'
        . '<a style="
    height: 35px;
    display: inline-block;
    background: #e552d6; /* Old browsers */
    background: -moz-linear-gradient(top,  #e552d6 0%, #e209c9 100%)
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e552d6), color-stop(100%,#e209c9)); 
    background: -webkit-linear-gradient(top,  #e552d6 0%,#e209c9 100%); 
    background: -ms-linear-gradient(top,  #e552d6 0%,#e209c9 100%); 
    background: linear-gradient(to bottom,  #e552d6 0%,#e209c9 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#e552d6\', endColorstr=\'#e209c9\',GradientType=0 ); 

    color: #fefefe;
    text-align: center;
    font: normal 14px Segoeui, Myriad Pro, Verdana, serif;
    border-radius: 2px;
    -moz-border-radius: 2px;
    -khtml-border-radius: 2px;

    
    
    cursor: pointer;
    padding: 0 20px;"href="'.DOMAIN.'/account/recupere_contrasena/?key='.$hash.'">Recuperar clave</a>'
        . '<p>Saludos</p>'
        . '<p>Equipo de PluralPet<p>'
        . '</body></html>';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: soporte@pluralpet.com.uy' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
//echo $message;
mail($to, $subject, $message, $headers);


?>