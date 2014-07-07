<?php 

$carrusel = array(/*array('title'=>'','text'=>'Encuentrala de manera sensilla','loc'=>'top:20px;left:600px;','img'=>'comprar.jpg'),*/
                     array('title'=>'','text'=>'Conoce los mejores consejos para disfrutar al maximo de tu mejor amigo','loc'=>'top:20px;left:600px;','img'=>'consejos.jpg'),
                     array('title'=>'','text'=>'Encuentra un mundo de posibilidades para cruzar a tu mascota','loc'=>'top:40px;left:0px;','img'=>'cruzar.jpg'),
                     array('title'=>'','text'=>'Se parte de la solucion ayudandonos a unir mascotas con sus familias','loc'=>'top:20px;left:0px;','img'=>'encontrado.jpg'),
                     array('title'=>'','text'=>'Visita nuestra tienda y descubre los mejores productos','loc'=>'top:20px;left:600px;','img'=>'tienda.jpg'),
                     array('title'=>'','text'=>'Visita nuestra seccion dedicada especificamente a refuigios','loc'=>'top:20px;left:600px;','img'=>'adoptar.jpg')
    );
//echo '<pre>';
//print_r($perro[0]);die;
?>
        <div class="grid_12" style="margin-top:30px;">
            <div class="slidprev" style="display: block;margin-top:230px;margin-left:20px;"><span>Prev</span></div>
            <div class="slidnext" style="display: block;margin-top:230px;margin-right:24px;"><span>Next</span></div>
            <div class="caroufredsel_wrapper" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: 20px; z-index: auto; width: 940px; height: 500px; margin: 0px; overflow: hidden; cursor: move;">
                <div id="slider" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 6888px; height: 500px; z-index: auto;">
                    
                        <?php 
                        $counter=0;
                        foreach($carrusel as $key => $row){
                            $src = MEDIA.'carrusel/'.$row['img'];
                            echo '<div class="slide" style="width: 940px; height: 500px;">';
                                echo '<img src="'.$src.'" class="attachment-full wp-post-image" alt="slide2">';
                                echo '<div class="slid_text" style="'.$row['loc'].'">';
                                    if(!empty($row['title'])){
                                        echo '<h3 class="slid_title"><span>'.$row['title'].'</span></h3>';
                                    }
                                    echo '<div><span>'.$row['text'].'</span</div>';
                                    //echo '<p><span>al m&aacute;ximo de tu mascota</span></p>';
                                echo '</div>';
                             echo '</div>';
                             echo '</div>';
                        }
                        ?>
                        
                    
                    <!--
                    <div class="slide" style="width: 984px; height: 452.64000000000004px;">
                        <img width="984" height="480" src="<?php echo MEDIA; ?>slide3.jpg" class="attachment-full wp-post-image" alt="slide2">
                        <div class="slid_text">
                            <h3 class="slid_title"><span>Bulldog</span></h3>
                            <p><span>Breeze Theme is created to impress you and your customers,</span></p>
                            <p><span>which will helps you boost sales</span></p>
                            <p><span>and receive good feedback from your clients.</span></p>
                        </div>
                    </div>
                    
                    <div class="slide" style="width: 984px; height: 452.64000000000004px;">
                        <img width="984" height="480" src="/media/slide1.jpg" class="attachment-full wp-post-image" alt="slide1">
                        <div class="slid_text">
                            <h3 class="slid_title"><span>Labradores</span></h3>
                            <p><span>Breeze Theme is created to impress you and your customers,</span></p>
                            <p><span>which will helps you boost sales</span></p>
                            <p><span>and receive good feedback from your clients.</span></p>
                        </div>
                    </div>
                    <div class="slide" style="width: 984px; height: 452.64000000000004px;">
                        <img width="984" height="480" src="/media/slide2.jpg" class="attachment-full wp-post-image" alt="slide3">
                        <div class="slid_text">
                            <h3 class="slid_title"><span>Husky siberiano</span></h3>
                            <p><span>Breeze Theme is created to impress you and your customers,</span></p>
                            <p><span>which will helps you boost sales</span></p>
                            <p><span>and receive good feedback from your clients.</span></p>
                        </div>
                    </div>
                    -->
                </div>
            </div><!-- .slider -->
            <div class="clear"></div>
            <div id="myController" class="" style="display: block;">
                <?php 
                foreach($carrusel as $key => $row){
                    //echo '<a href="#" class=""><span>1</span></a>';
                }
                ?>
                <!--<a href="#" class=""><span>1</span></a><a href="#" class="selected"><span>2</span></a><a href="#" class=""><span>3</span></a>-->
            </div>
        </div><!-- .grid_12 -->
        <div class="clear"></div>
        <!--
        <div id="top_button">
            <div class="grid_4">
                <p><br>
                    <a href="#"><br>
                        <img class="alignnone size-full" alt="Banner " src="http://wordpress.breeze.itembridge.com/wp-content/uploads/2013/03/banner3.png" width="312" height="101"><br>
                    </a>
                </p>
            </div>
            <div class="clear"></div>
        </div>
        -->
        <div id="primary">
            
            <?php 
            $paneles_to_table = array('perro'=>'mascota','gato'=>'mascota','servicio'=>'anuncio');
            $paneles = array('oferta'=>'Ofertas del d&iacute;a','producto'=>'Productos destacados','perro'=>'Perros destacados','gato'=>'Gatos destacados', 'servicio'=>'Servicios destacados');
            foreach($paneles as $key=>$row){ ?>
            <div id="content" role="main">
                <div id="content" role="main">
                    <div class="carousel">
                        <div class="c_header">
                            <div class="grid_10">
                                <h2><?php echo $row; ?></h2>
                            </div><!-- .grid_10 -->
                            <div style="clear:both"></div>
                            <div class="destacado">
                            <?php 
                                if(isset($$key)){
                                    foreach($$key as $k=>$r){ ?>
                                <div class="destacado_container">
                                    <div style="" class="thumb">
                                        <a title="<?php echo $r->titulo;?>" href="/<?php echo $paneles_to_table[$key];?>/<?php echo $r->id;?>">
                                            <img alt="<?php echo $r->nombre_original;?>" style="width:100%;height:100%;" src="<?php echo MEDIA.'upload/'.$r->foto_1; ?>">
                                        </a>
                                    </div>
                                    <div class="title">
                                        <?php echo $r->titulo; ?>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                            <div style="clear:both"></div>
                            <!--
                            <div class="grid_2">
                                <a id="next_c" class="next arows" href="#"><span>Next</span></a>
                                <a id="prev_c" class="prev arows" href="#"><span>Prev</span></a>
                                
                            </div>
                            -->
                        </div><!-- .c_header -->
                        <div class="list_carousel grid">
                        </div><!-- .list_carousel -->
                    </div><!-- .carousel -->
                </div><!-- #content -->
            </div>
            <?php } ?>
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
    Carussel.init();
</script>