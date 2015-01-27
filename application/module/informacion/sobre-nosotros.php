<?php 

$title = htmlentities("SOBRE NOSOTROS");
$subtitle1 = htmlentities("Qué es PluralPet");
$text1 = htmlentities("PluralPet tiene como cometido ser el lugar de referencia en el ámbito de los animales domésticos, así como punto de encuentro entre comunidades "
        . "pertenecientes al sector; ya sea a nivel profesional, como propietarios o simplemente apasionados a los animales. En PluralPet tenemos como objetivo "
        . "brindarte todo lo necesario para que desarrolles tu pasión por los animales.");
$text2 = htmlentities("PluralPet tiene como cometido ser el lugar de referencia en el ámbito de los animales domésticos, 
así como punto de encuentro entre comunidades pertenecientes al sector; ya sea a nivel 
profesional, como propietarios o simplemente apasionados a los animales. 
En PluralPet tenemos como objetivo brindarte todo lo necesario para que desarrolles tu pasión por 
los animales.");

$text3 = htmlentities("Formamos PluralPet un equipo multidisciplinario del entorno de negocios, diseño y programación 
con formación específica y con un sentimiento común; nuestra pasión incondicional hacia los 
animales.");

$subtitle2 = htmlentities("Misión");
$text4 = htmlentities("Brindar un servicio que supere las expectativas de nuestros clientes y socios de negocios,
sobre la base de un ambiente de trabajo conformado por un equipo especializado, innovador y 
constante, así como un Compromiso profundo con la sociedad y los animales.");

$subtitle3 = htmlentities("Visión");
$text5 = htmlentities("Ser líderes en mejorar continuamente la relación entre animales domésticos y seres humanos");

?>


<div class="informacion">
    <h3><?php echo $title; ?></h3>
    <h5><?php echo $subtitle1; ?></h5>
    <p><?php echo $text1; ?></p>
    <p><?php echo $text2; ?></p>
    <p><?php echo $text3; ?></p>
    <div>
    <ul>
        <li><b>Juan Leira</b> - Directora general y Desarrollo del negocio</li>
        <li><b>Rafael Arcieri</b> - Responsable T&eacute;cnico</li>
        <li><b>Diego Monteri&ntilde;o</b> - Responsable Grafico</li>
    </ul>
    </div>
    <h5><?php echo $subtitle2; ?></h5>
    <p><?php echo $text4; ?></p>
    <h5><?php echo $subtitle3; ?></h5>
    <p><?php echo $text5; ?></p>
</div>