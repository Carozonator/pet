<?php 

$carrusel = array(/*array('title'=>'','text'=>'Encuentrala de manera sensilla','loc'=>'top:20px;left:600px;','img'=>'comprar.jpg'),*/
                     /*array('title'=>'','text'=>'Conoce los mejores consejos para disfrutar al máximo de tu mascota.','loc'=>'left:0px;','img'=>'consejos.jpg','link'=>'/consejo/perro/'),*/
                 array('title'=>'','text'=>'Abasto','loc'=>'left:0px;','img'=>'abasto.jpg','link'=>'https://www.facebook.com/abasto.deraciones'),
                     /*array('title'=>'','text'=>'Encuentra un mundo de posibilidades para cruzar a tu mascota.','loc'=>'left:0px;','img'=>'cruzar.jpg','link'=>'/cruzar/perro/'),*/
                 array('title'=>'','text'=>'ThunderShirt','loc'=>'left:0px;','img'=>'thunder.jpg','link'=>'http://www.thundershirt.com/'),
                    /* array('title'=>'','text'=>'Se parte de la solución al unir mascotas perdidas con sus familias.','loc'=>'left:0px;','img'=>'encontrado.jpg','link'=>'/perdidos-y-encontrados/perro/'),*/
                 array('title'=>'','text'=>'MundoMascota','loc'=>'left:0px;','img'=>'mundomascota.jpg','link'=>'http://mundomascota.com.uy/'),
                     /*array('title'=>'','text'=>'Visita nuestra tienda y descubre los mejores productos.','loc'=>'left:600px;','img'=>'tienda.jpg','link'=>'/tienda/producto/'),*/
                 array('title'=>'','text'=>'Dexas','loc'=>'left:0px;','img'=>'dexas.jpg','link'=>'http://store.dexas.com/home/'),
                     /*array('title'=>'','text'=>'Visita nuestra sección dedicada específicamente a refugios.','loc'=>'left:600px;','img'=>'adoptar.jpg','link'=>'/adoptar/perro/'),*/
                 array('title'=>'','text'=>'Solvit','loc'=>'left:0px;','img'=>'solvit.jpg','link'=>'http://www.solvitproducts.com/'),
                     /*array('title'=>'','text'=>'Agrega un nuevo integrante a tu familia.','loc'=>'right:0px;','img'=>'comprar.jpg','link'=>'/comprar/perro/'),*/
                 array('title'=>'','text'=>'Reyes de la Pradera','loc'=>'left:0px;','img'=>'reyes.jpg','link'=>'https://www.facebook.com/reyesdela.pradera?ref=br_rs'),
                 /*array('title'=>'','text'=>'Sanremo','loc'=>'left:0px;','img'=>'sanremo.jpg','link'=>''),*/
    );
?>



        <div class="grid_12" style="margin-top:30px;">
            <script>
    jQuery(document).ready(function ($) {
        
        var _CaptionTransitions = ["here","there"];
        //use following line instead if there is no caption plays random transition
        //var _CaptionTransitions = [];
        
        //define named transitions for caption that plays specified transition
        //_CaptionTransitions["transtion_name1"] =  "here" ;
        //_CaptionTransitions["transtion_name2"] =  "code2" ;
        //_CaptionTransitions["transtion_name3"] =  "code3" ;
        //_CaptionTransitions["transtion_name4"] =  "code4" ;
        var width = $(document).width();
        if(width<=1080){
            $('#slider1_container').css('height',width*.48);
            $('.slider_inner').css('height',width*.48);
        }
        var options = { 
                $AutoPlay: true,
                $Duration:1000,
                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $DisableDrag: true                              //[Optional] Disable drag or not, default value is false
                },
                $SlideDuration: 700,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
    });
</script>
<div id="slider1_container">
    <div u="slides" class="slider_inner">
        <?php 
        foreach($carrusel as $key => $row){
            $src = MEDIA.'carrusel/'.$row['img'];
            echo '<div>';
            echo '<img u="image" src="'.$src.'" />';
            echo '<div u="thumb"><a style="color:white;cursor:pointer;" href="'.$row['link'].'">'.htmlentities($row['text']).'</a></div>';
            echo '</div>';
        }
        ?>
        <!--
        <div u="thumbnavigator" class="sliderb-T">
            <div class="sliderb-T_inner">
            </div>
            
            <div u="slides">
                <div u="prototype" class="slider_prototype">
                    <div u="thumbnailtemplate" class="slider_prototype_thumbnail"></div>
                </div>
            </div>
        </div>
        -->
        <style>
            .jssora14l, .jssora14r, .jssora14ldn, .jssora14rdn
            {
            	position: absolute;
            	cursor: pointer;
            	display: block;
                background: url(/public/vendor/slider-master/img/a14.png) no-repeat;
                overflow:hidden;
            }
            .jssora14l { background-position: -15px -35px; }
            .jssora14r { background-position: -75px -35px; }
            .jssora14l:hover { background-position: -135px -35px; }
            .jssora14r:hover { background-position: -195px -35px; }
            .jssora14ldn { background-position: -255px -35px; }
            .jssora14rdn { background-position: -315px -35px; }
        </style>
        <span u="arrowleft" class="jssora14l" style="width: 30px; height: 50px; top: 123px; left: 0px;">
        </span>
        <span u="arrowright" class="jssora14r" style="width: 30px; height: 50px; top: 123px; right: 0px">
        </span>
        <a style="display: none" href="http://www.jssor.com">Image Slider</a>
    </div>
</div>
            <div class="clear"></div>
            
        </div><!-- .grid_12 -->
        <div class="clear"></div>
        <div class="main-content-box" style="" id="">
            
            <?php 
            $paneles_to_table = array('perro'=>'mascota','gato'=>'mascota','servicio'=>'anuncio','producto'=>'producto','oferta'=>'producto');
            $paneles = array(
                'oferta'=>'Ofertas de la semana',
                'producto'=>'Productos destacados',
                'perro'=>'Perros destacados',
                'gato'=>'Gatos destacados', 
                'servicio'=>'Servicios destacados');
            foreach($paneles as $key=>$row){ ?>
                
                        <div class="destacado_title">
                            <h2><?php echo $row; ?></h2>
                        </div>
                        <div class="destacado">
                            <div style="clear:both"></div>
                            <div class="strip">
                            <?php 
                                if(isset($$key)){
                                    foreach($$key as $k=>$r){ ?>
                                        <div class="destacado_container">
                                            <div>
                                                <div style="" class="thumb">
                                                    <a title="<?php echo $r->titulo;?>">
                                                        <img alt="<?php echo $r->nombre_original;?>" style="width:100%;height:100%;" src="<?php echo MEDIA.'upload/'.$r->foto_usuario.'/thumb_'.$r->foto_name; ?>">
                                                    </a>
                                                </div>
                                                <div class="title">
                                                    <a href="/<?php echo $paneles_to_table[$key];?>/<?php echo $r->id;?>">
                                                    <?php echo $r->titulo; ?>
                                                    </a>
                                                </div>
                                                <div class="type">
                                                    <?php 
                                                    if($key=='servicio'){
                                                        echo $r->tipo;
                                                    }else{
                                                        echo $r->animal_detail;
                                                    }
                                                    ?>
                                                </div>
                                                <div class="description">
                                                    <a style="color:black;" title="<?php echo $r->titulo;?>" href="/<?php echo $paneles_to_table[$key];?>/<?php echo $r->id;?>">
                                                        <!--<?php echo substr(addslashes($r->descripcion),0,40).'...'; ?>-->
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="details">
                                                    <?php 
                                                        //if($key=='servicio'){
                                                            echo '<span title="'.$r->ciudad_barrio.', '.$r->departamento.'" style="font-size:14px;">'.(!empty($r->ciudad_barrio)?$r->ciudad_barrio.', ':'').$r->departamento.'</span>';
                                                        //}else{
                                                            //echo '<span class="precio">'.moneda($moneda).number_format($r->precio,0,',','.').'</span>'; 
                                                        //}
                                                    ?>
                                                <span style="text-align:right;float:right;width:50px;margin-top:10px;">
                                                    <button onclick="window.location='/<?php echo $paneles_to_table[$key];?>/<?php echo $r->id;?>'" class="button">VER</button>
                                                </span>
                                                <div style="clear:both"></div>
                                            </div>
                                        </div>
                            <?php }} ?>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                        
                        <div class="list_carousel grid"></div>
            <?php } ?>
        </div>
        <div class="main-content-box" style="margin-top:50px;margin-bottom:50px;" id="">
            <?php             
            foreach($articulos as $key=>$row){
                foreach($row as $r){
            ?>
            <div class="articulo" style="border-bottom:0px;margin-bottom:0px;float:left;">
                
                <div>
                    <h2 style="padding-left:15px;">
                    <?php 
                    if(strcmp($key,'anuncio')===0){
                        echo 'Anuncios y eventos';
                    }else{
                        echo '&iquest;Sab&iacute;as que?';
                    }
                    ?>
                    </h2>
                </div>
                
                <div class="strip">
                    <div class="articulo_container" style="position:relative">
                        <div>
                            <div class="thumb">
                                <a title="<?php echo $r->titulo;?>">
                                    <img onclick="window.location='/<?php echo $key;?>/<?php echo $r->id;?>'" alt="<?php echo $r->nombre_original;?>" style="width:100%;height:100%;cursor:pointer;" src="<?php echo MEDIA.'upload/'.$r->foto_usuario.'/thumb_'.$r->foto_name; ?>">
                                </a>
                            </div>
                            <div class="articulo_text" style="overflow:hidden;">
                                <div class="title">
                                    <a href="/anuncio/<?php echo $r->id;?>">
                                        <?php echo htmlEncodeText($r->titulo); ?>
                                    </a>
                                </div>
                                <span class="description">
                                    <?php echo substrText($r->descripcion,150); ?>
                                </span>
                            </div>
                        </div>
                            <span class="articulo_ver_button">
                                <button onclick="window.location='/<?php echo $key;?>/<?php echo $r->id;?>'" class="button">Ver m&aacute;s</button>
                            </span>
                    </div>
                </div>
            </div>
            <?php }} ?>
            <div style="clear:both"></div>
            <!--
            <div id="content_bottom">
                <div class="grid_4">

                    <div class="bottom_block about_as"><h3>About Us</h3>			<div class="textwidget">A block of text is a stack of line boxes. In the case of 'left', 'right' and 'center', this property specifies how the inline-level boxes within each line box align with respect to the line box's

Alignment is not with respect to the viewport. In the case of 'justify', this property specifies that the inline-level boxes are to be made flush with both sides of the line box if possible.

by expanding or contracting the contents of inline boxes, else aligned as for the initial value.</div>
		</div>
                </div>

                

                <div class="grid_4">

                    <div class="bottom_block news"><h3>News</h3>			<div class="textwidget"><ul>
              <li>
                <time datetime="2012-03-03">3 january 2012</time><br>
                <a href="#">A block of text is a stack of line boxes. In the case of 'left', 'right' and 'center', this property specifies</a>
              </li>

              <li>
                <time datetime="2012-02-03">2 january 2012</time><br>
                <a href="#">A block of text is a stack of line boxes. In the case of 'left', 'right' and 'center', this property specifies</a>
              </li>

              <li>
                <time datetime="2012-01-03">1 january 2012</time><br>
                <a href="#">A block of text is a stack of line boxes. In the case of 'left', 'right' and 'center', this property specifies how the inline-level boxes within each line</a>
              </li>
            </ul></div>
		</div>
                </div>

                

                <div class="grid_4">

                    <div class="bottom_block newsletter"><h3>Newsletter</h3>			<div class="textwidget"><p>Cursus in dapibus ultrices velit fusce. Felis lacus erat. Fermentum parturient lacus tristique habitant nullam morbi et odio nibh mus dictum tellus erat.</p>
{subscription_form}
<div class="lettel_description">
              Vel lobortis gravida. Cursus in dapibus ultrices velit fusce. Felis lacus erat.
            </div></div>
		</div>
                </div>
                <div class="clear"></div>
            </div>#content_bottom -->
	</div><!-- #content -->
</div><!-- #primary -->
</div><!-- .container_12 -->


<script>
    //Carussel.init();
</script>