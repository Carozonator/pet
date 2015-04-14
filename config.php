<?php
//namespace pluralpet;
// Directories

//phpinfo();die;



$constant['ROOT'] =  dirname(__FILE__).'/';

$constant['MEDIA'] = '/media/';

$constant['UPLOAD'] = $constant['ROOT'].'media/upload/';

$constant['PUBLIC_PATH'] = '/public/';

//$constant['MEDIA'] = '/public/media/';
// Database
$constant['DB_ADD'] = '192.186.233.197';

$constant['DB_NAME'] = 'pet';

$constant['DB_USER'] = 'juan';

$constant['DB_PASSWORD'] = 'Andthenew12';

$constant['DOMAIN'] = 'http://'.$_SERVER['SERVER_NAME'];

/*
$constant['DB_ADD'] = 'localhost:3306';
$constant['DB_NAME'] = 'pet';
$constant['DB_USER'] = 'root';
$constant['DB_PASSWORD'] = '';
*/

$GLOBALS['nav_menu'] = array('publicar'=>array(
                                                            array('mascota'=>'Mascotas'),
                                                            array('producto'=>'Productos En Tienda'),
                                                            array('anuncio'=>'Anuncios')
                                                            
                                ),'mascota'=>array(
                                                            array('perro'=>'Perros'),
                                                            array('gato'=>'Gatos'),
                                                            array('ave'=>'Aves'),
                                                            array('reptil'=>'Reptiles'),
                                                            array('pez'=>'Peces'),
                                                            array('mamifero'=>'Peque&ntilde;os mamiferos'),
                                                            array('otro'=>'Otros')
                                ),'tienda'=> array(
                                                            array('producto' => 'Ir a la tienda'),
                                                            array('ofertas' => 'Ofertas del dia')
                                ),'adoptar'=> array(
                                                            array('perro'=> 'Perros'),
                                                            array('gato'=> 'Gatos'),
                                                            array('otro'=> 'Otros')
                                ),'perdido'=> array(
                                                            array('perro'=> 'Perros'),
                                                            array('gato'=> 'Gatos'),
                                                            array('otro'=> 'Otros')
                                ),'encontrado'=> array(
                                                            array('perro'=> 'Perros'),
                                                            array('gato'=> 'Gatos'),
                                                            array('otro'=> 'Otros')
                                ),'cruzar'=> array(
                                                            array('perro'=> 'Perros'),
                                                            array('gato'=> 'Gatos'),
                                                            array('otro'=> 'Otros')
                                ),'anuncio'=> array(
                                                            array('veterinaria'=> 'veterinarias'),
                                                            array('paseador'=> 'paseadores'),
                                                            array('adiestrador'=> 'Adiestradores'),
                                                            array('pensionado'=> 'pensionado'),
                                                            array('peluqueria'=> 'peluqueria'),
                                                            array('servicio-medico-adicionales'=> 'Servicios m&eacute;dicos adicionales'),
                                                            /*array('evento'=>'Eventos')*/
                                                            array('otros'=> 'otros')
                                ),'consejo'=> array(
                                                            array('perro'=>'Perros'),
                                                            array('gato'=>'Gatos'),
                                                            array('ave'=>'Aves'),
                                                            array('reptil'=>'Reptiles'),
                                                            array('peces'=>'Peces'),
                                                            array('mamiferos'=>'Peque&ntilde;os mamiferos'),
                                                            array('otros'=>'Otros')
                                )
                                );





$constant['CAMBIO'] = 25;

if($_SESSION['user']->id==7 || $_SESSION['user']->id==1){
    $GLOBALS['nav_menu']['publicar'][]=array('consejo'=>'Consejos');
}

$GLOBALS['refugio']= array('','Animales Sin Hogar','Animal Help','A.P.A el Refugio');

$GLOBALS['departamento'] = array('Artigas'=>array('Artigas','Bella Union','Tom&aacute;s Gomensoro','Baltasar Brum','Sequeira'),
                     'Canelones'=>array('Ciudad de la Costa','Las Piedras','Barros Blancos','Pando','La Paz','Canelones','Santa Lucia','Progreso','18 de Mayo',
    'Aguas Corrientes','Atl&aacute;ntida','Colonia Nicolich','Empalme Olmos','Joaqu&iacute;n Su&aacute;rez','La Floresta','Los Cerrillos','Migues','Montes',
    'Parque del Plata','Paso Carrasco','Salinas','San Antonio','San Bautista','San Jacinto','San Ram&oacute;n','Santa Rosa','Sauce','Soca','Tala','Toledo'),
                     'Cerro Largo'=>array('Acegu&aacute;','Fraile Muerto','Isidoro Nobl&iacute;a','Melo','Rio Branco','Tupamba&eacute;'),
                     'Colonia'=>array('Carmelo','Colonia del Sacramento','Florencio S&aacute;nchez','Juan Lacaze','Nueva Helvecia','Nueva Palmira','Omb&uacute;es de Lavalle','Rosario','Tarariras'),
                     'Durazno'=>array('Blanquillo','Carmen','Centenario','Durazno','La Paloma','Santa Bernardina','Sarand&iacute; del Yi'),
                     'Flores'=>array('Trinidad'),
                     'Florida'=>array('25 de Mayo','25 de Agosto','Cardal','Casup&aacute;','Cerro Colorado','Florida','Fray Marcos','Nico P&eacute;rez','Sarand&iacute; Grande'),
                     'Lavalleja'=>array('Jos&eacute; Pedro Varela','Sol&iacute;s de Mataojo','Jos&eacute; Batlle y Ord&oacute;&ntilde;ez','Mariscala','Minas'),
                     'Maldonado'=>array('Maldonado','San Carlos','Punta Del Este','Aigu&aacute;','Garz&oacute;n','Pan de Az&uacute;car','Piri&aacute;polis','Sol&iacute;s Grande'),
                     'Montevideo'=>array("Aguada","Aires Puros","Arroyo Seco","Atahualpa","Barra de Carrasco","Bella Vista","Belvedere","Bolivar","Brazo Oriental","Buceo",
        "Capurro","Carrasco","Casabo","Centro","Cerrito","Cerro","Ciudad Vieja","Cno. Carrasco","Cno. Maldonado","Col&oacute;n","Cord&oacute;n","Goes","Golf","Ituzaing&oacute;",
        "Jacinto Vera","Jardines Hip&oacute;dromo","La Blanqueada","La Colorada","La Comercial","La Figurita","La Teja","Las Acacias","Lezica","Malvin",
	"Malvin Norte","Manga","Marconi","Maro&ntilde;as","Maro&ntilde;as, Curva","Melilla","Montevideo","Nuevo Par&iacute;s","Otras","Pajas Blancas","Palermo","Parque Batlle",
        "Parque Rod&oacute;","Paso Molino","Paso de la Arena","Pe&ntilde;arol","Piedras Blancas","Pocitos","Pocitos Nuevo","Prado","Puerto Buceo","Punta Carretas","Punta Gorda",
        "Punta Rieles","Reducto","Santiago V&aacutezquez","Sayago","Toledo Chico","Tres Cruces","Uni&oacute;n","Villa Biarritz","Villa Col&oacute;n","Villa Dolores","Villa Espa&ntilde;ola",
	"Villa Garc&iacute;a","Villa Mu&ntilde;oz","Villa del Cerro","Larra&ntilde;aga","Barrio Sur","Barros Blancos","Conciliaci&oacute;n","Paso de las Duranas","Las Canteras",
        "Playa Pascual","Libertad","Casavalle"),
                     'Paysandu'=>array('Paysandu','Nuevo Paysand&uacute;','Guich&oacute;n','Chacras de Paysand&uacute;','Quebracho','San Félix','Porvenir','Tambores','Piedras Coloradas'),
                     'Rio Negro'=>array('Fray Bentos','Young','Nuevo Berl&iacute;n','San Javier','Nuevo Berl&iacute;n','San Javier'),
                     'Rivera'=>array('Rivera','Tranqueras','Minas de Corrales','Vichadero'),
                     'Rocha'=>array('Rocha','Chuy','Lascano','Castillos','La Paloma','Cebollat&iacute;','La Aguada-Costa Azul','Vel&aacute;zquez','Punta del Diablo',
        'Aguas Dulces','Barra del Chuy','Barra de Valizas','Arachania','Cabo Polonio'),
                     'Salto'=>array('Salto','Constituci&oacute;n','Belén'),
                     'San Jose'=>array('San Jose de Mayo','Ciudad del Plata','Libertad','Rodr&iacute;guez','Ecilda Paullier','Puntas de Valdez','Rafael Perazza'),
                     'Soriano'=>array('Mercedes','Dolores','Cardona','Palmitas','José Enrique Rod&oacute;','Chacras de Dolores','Villa Soriano'),
                     'Tacuarembo'=>array('Tacuarembo','Paso de los Toros','San Gregorio de Polanco','Villa Ansina','Tambores','Las Toscas','Curtina'),
                     'Treinta y Tres'=>array('Treinta y Tres','Vergara','Santa Clara de Olimar','Cerro Chato','Villa Sara','General Enrique Mart&iacute;nez')
                     );

	

/*





























  
  */

$raza=array();
$raza['perro'] = array('','Akita Inu', 'Alaskan Malamute', 'American Staffordshire Terrier','Barzoi', 'Basenji',
    'Basset Azul de Gascuña', 'Basset Hound', 'Beagle', 'Beagle Harrier', 'Bearded Collie','Beauceron','Bedlington Terrier', 'Bichón Maltés', 'Blood Hound','Bobtail',
    'Border Collie', 'Borzoi','Boxer','Boston Terrier', 'Boyero de Berna','Boyero de Flandes', 'Braco Alemán', 'Braco Francés', 'Briard', 'Bull Terrier Inglés', 
    'Bulldog Francés', 'Bulldog Inglés', 'Bullmastiff', 'Cairn Terrier', 'Cane Corso','Caniche Gigante','Caniche mediano', 'Caniche Toy','Carlino','Cavalier King Charles', 
    'Chihuahua', 'Cimarron', 'Chow Chow', 'Cocker Spaniel Americano', 'Cocker Spaniel Inglés', 'Collie Rough', 'Collie Smooth', 'Corgi Pembroke','Crestado Chino',
    'Dálmata', 'Doberman', 'Dogo Argentino', 'Dogo de Burdeos', 'Epagneul Bretón', 'Epagneul Francés', 'Epagneul Japonés', 
    'Fox Terrier', 'Galgo Español', 'Galgo Irlandés', 'Golden Retriever', 'Gordon Setter', 'Gos d\'Atura', 'Gran Danés', 'Grey Hound','Havanesse',
    'Husky Siberiano', 'Irish Soft Coated Wheaten Terrier','Jack Russell Terrier','Kelpie','Komondor', 'Labrador Retriever', 'Lebrel Afgano', 'Lebrel Polaco','Leonberger', 'Mastiff', 'Mastín de los Pirineos', 
    'Lhasa Apso','Mastín Español', 'Mastín Napolitano', 'Montaña de los Pirineos', 'Norfolk Terrier', 'Norwich Terrier', 'Papillon', 
    'Pastor Alemán', 'Pastor Australiano', 'Pastor Belga', 'Pastor Blanco Suizo', 'Pastor de la Beauce', 'Pastor de los Pirineos','Pastor de las Shetland',
    'Pekinés', 
    'Pequeño Azul de Gascuña', 'Pequeño Basset Griffon', 'Pequeño Brabantino', 'Pequeño Perro León', 'Pequeño Perro Ruso', 
    'Pequeño Sabueso Suizo', 'Perdiguero de Burgos', 'Perdiguero Portugués', 'Perro del Faraon','Perro de Agua Español', 'Perro Lobo de Checoslovaquia', 'Pinscher miniatura',
    'Pinscher Aleman',
    'Pit Bull', 'Podenco Canario', 'Podenco Ibicenco', 'Pointer Inglés', 'Pomerania','Presa Canario', 'Pug','Puli Húngaro', 'Rafeiro do Alentejo', 'Rodesiano',
    'Rottweiler','Saluky', 'Samoyedo', 'San Bernardo', 'Schnauzer gigante', 'Schnauzer mediano', 'Schnauzer miniatura', 'Scottish Terrier', 
    'Setter Inglés', 'Setter Irlandés', 'Shar Pei', 'Shih Tzu', 'Spitz', 'Springer Spaniel Galés', 'Springer Spaniel Inglés', 
    'Teckel', 'Terranova', 'Vizsla','Weimaraner', 'Westies','West Highland White Terrier', 'Whippet', 'Yorkshire Terrier','OTRO');

foreach($raza['perro'] as $row){
    $r[]=  htmlentities($row);
}
$raza['perro']=$r;

$raza['gato'] = array('','Abisinio','Aphrodite\'s Giants','Australian Mist','American Curl','Azul ruso','American shorthair','American wirehair',
    'Angora turco','Africano doméstico','Bengala','Bobtail japon&eacute;s','Bombay','Bosque de Noruega','Brazilian Shorthair','British Shorthair',
    'Burm&eacute;s','Burmilla','Cornish rex','California Spangled','Ceylon','Cymric','Chartreux','Deutsch Langhaar','Devon rex','Dorado africano','Don Sphynx',
    'Europeo com&uacute;n','German Rex','Habana brown','Himalayo','Korat','Khao Manee','Maine Coon','Manx','Mau egipcio','Munchkin','Ocicat','Oriental',
    'Oriental de pelo largo','Ojos azules','Persa','Peterbald','Pixi Bob','Ragdoll','Sagrado de Birmania','Scottish Fold','Selkirk rex','Serengeti',
    'Seychellois','Siam&eacute;s','Siam&eacute;s Moderno','Siam&eacute;s Tradicional','Siberiano','Snowshoe','Sphynx','Tonkin&eacute;s','Van Turco'
);

$raza['mamifero'] = array('','Conejo Enano','Cobaya','Ardilla de Corea','Chinchilla','Ardilla Richardson','Rata Canguro','H&aacute;mster Com&uacute;n',
    'H&aacute;mster Ruso','H&aacute;mster Ruso Albino','H&aacute;mster Ruso Blanco','H&aacute;mster Campbelli','H&aacute;mster Roborowski','Hur&oacute;n',
    'Erizo Enano','Jerbo');

$raza['ave'] = array('','Agapornis','Amazonas','Cacat&uacute;as','Caiques','Conuros','Eclectus','Forpus','Guacamayo','Loris','Ninfas','Periquitos',
    'Pionus','Poicephalus','Yacos','Canario','Diamante Mandarín','Loro Gris Africano','Ninfa','Periquito');

$raza['reptil'] = array('','Tortuga','Musurana Marr&oacute;n','Serpiente del ma&iacute;z','Serpiente Rey de California','Pit&oacute;n Birmana','Culebra',
    'Iguana','Musurana Marr&oacute;n','Gecko');

$raza['pez'] = array('','Calico','Burbuja','Carpa','Cometa','Telescopico','Fantail','Carasius','Ramiretzi','Besador','Betta','Gourami enano','Gourami Azul',
    'Oscar','Locha Payaso','Arlequ&iacute;n','Boca de Fuego','Espadas','Escalar','Discus','Corydora','Vieja del agua','Ne&oacute;n','Pez Hacha','Molly negro',
    'Labeo de cola roja','Barbo Tigre','Danio Zebra','Ballesta Payaso','Ballesta','Angel Rey','Angel Coral','Angel Zanclus','Leopardo','Escorpi&oacute;n','Cirujano',
    'Damicela','Payaso','Puffer','Mariposa','Labroides','Morena','Cangrejo Ermitaño','Hippocampo','Hippocampo Kuda');

$raza['otro'] = array('','Caballo');


$raza['otro_todos'] = array('','Conejo Enano','Cobaya','Ardilla de Corea','Chinchilla','Ardilla Richardson','Rata Canguro','H&aacute;mster Com&uacute;n',
    'H&aacute;mster Ruso','H&aacute;mster Ruso Albino','H&aacute;mster Ruso Blanco','H&aacute;mster Campbelli','H&aacute;mster Roborowski','Hur&oacute;n',
    'Erizo Enano','Jerbo','Agapornis','Amazonas','Cacat&uacute;as','Caiques','Conuros','Eclectus','Forpus','Guacamayo','Loris','Ninfas','Periquitos',
    'Pionus','Poicephalus','Yacos','Canario','Diamante Mandarín','Loro Gris Africano','Ninfa','Periquito',
    'Tortuga','Musurana Marr&oacute;n','Serpiente del ma&iacute;z','Serpiente Rey de California','Pit&oacute;n Birmana','Culebra',
    'Iguana','Musurana Marr&oacute;n','Gecko',
    'Calico','Burbuja','Carpa','Cometa','Telescopico','Fantail','Carasius','Ramiretzi','Besador','Betta','Gourami enano','Gourami Azul',
    'Oscar','Locha Payaso','Arlequ&iacute;n','Boca de Fuego','Espadas','Escalar','Discus','Corydora','Vieja del agua','Ne&oacute;n','Pez Hacha','Molly negro',
    'Labeo de cola roja','Barbo Tigre','Danio Zebra','Ballesta Payaso','Ballesta','Angel Rey','Angel Coral','Angel Zanclus','Leopardo','Escorpi&oacute;n','Cirujano',
    'Damicela','Payaso','Puffer','Mariposa','Labroides','Morena','Cangrejo Ermitaño','Hippocampo','Hippocampo Kuda',
    'Caballo');

sort($raza['otro_todos']);

$GLOBALS['raza']=$raza;
$GLOBALS['raza_o_animal']= array('perro'=>'Raza','gato'=>'Raza','mamifero'=>'Animal','pez'=>'Animal','mamifero'=>'Animal','ave'=>'Animal','reptil'=>'Animal','otro'=>'Animal');









$GLOBALS['producto'] = array(
                'perro'=>array("accesorios","transporte","alimentos","camas","casillas","collarez","comederos","correas","jaulas","juguetes","ropa"),
                'gato'=>array("accesorios","transporte","alimentos","camas","casillas","collarez","comederos","juguetes"),
                'ave' => array("accesorios","alimentos","jaulas","salud"),
                'repitl' => array("accesorios","alimentos","salud","terrarios","transporte"),
                'mamifero' =>  array("accesorios","alimentos","jaulas","juguetes","salud","transporte"),
                'pez' => array("accesorios","alimentos","parideras","peceras","salud"));






// Define constants
foreach($constant as $key => $row){
    define($key,$row);
}

// Autoload classes
function __autoload($class_name) {
    //preg_match('/\\.*/', $class_name,$match);
    //$class_name = $match[0];
    //echo $class_name;
    $aName = explode('\\',$class_name);
    $nameSize = count($aName);
    $class_name = $aName[$nameSize-1];
    if( file_exists(ROOT . '/application/controller/' . $class_name.'.php')) {
            //require_once(ROOT . '/application/controller/' . $class_name . '.php');
    }
    if( file_exists(ROOT . 'application/model/' . $class_name.'.php')) {
            require_once(ROOT . 'application/model/' . $class_name . '.php');
    }
    if( file_exists(ROOT . '/framework/' . $class_name . '.php')) {
            require_once(ROOT . '/framework/' . $class_name . '.php');
    }
    
    
}



date_default_timezone_set('America/Sao_Paulo');


function moneda($moneda){
    if($moneda=='us'){
        return 'U$S';
    }elseif($moneda=='uy'){
        return '$';
    }else{
        return '$';
    }
}

function parseMoney($money){
    return intval(str_replace(array(',','.'),'',$money));
}

function precio($precio){
    return number_format($precio,0,',','.');
}

function fecha($uts){
    $post_day = strtotime('today midnight',$uts);
    $today = strtotime('today midnight',time());
    $days_ago = ($post_day-$today)/(60*60*24);
    
    switch($days_ago){
        case 0:
           $date = "Hoy a las ".date("H:i",$uts);
        break;
        case 1:
            $date = "Ayer a las ".date("H:i",$uts);
        break;
        default:
            $date = "Hace ".($days_ago*-1)." dias";
        break;
    }
    
    return $date;
}

function htmlEncodeText($desc){
    return htmlspecialchars_decode(htmlentities($desc, ENT_NOQUOTES, 'UTF-8'), ENT_NOQUOTES);
}

function substrText($text,$len){
    $t = strip_tags(htmlEncodeText($text));
    $new_len=strlen($t);
    
    for($i=$len;$i<strlen($t);$i++){
        if(strcmp(substr($t,$i,1)," ")===0){
            return substr($t,0,$i).'...';
        }
    }
    return substr($t,0,$new_len);
}


?>